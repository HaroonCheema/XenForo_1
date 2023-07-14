<?php

namespace FS\Escrow\Pub\Controller;

use XF\Mvc\ParameterBag;
use XF\Pub\Controller\AbstractController;
use XF\Mvc\RouteMatch;

class Escrow extends AbstractController
{
    public function actionIndex(ParameterBag $params)
    {
        $rules = [];
        $rules[] = [
            'message' => \XF::phrase('fs_escrow_rules'),
            "display_image" => "avatar",
            "display_style" => "primary",

        ];
        $viewpParams = [
            'rules' => $rules
        ];


        return $this->view('FS\Escrow', 'fs_escrow_landing', $viewpParams);
    }

    public function actionAdd(ParameterBag $params)
    {

        $options = $this->app()->options();

        $forum = $this->finder('XF:Forum')->where('node_id', intval($options->fs_escrow_applicable_forum))->fetchOne();

        return $this->redirect($this->buildLink('forums/post-thread', $forum));

        $viewpParams = [];
        return $this->view('FS\Escrow', 'fs_escrow_addEdit', $viewpParams);
    }

    public function actionDeposit(ParameterBag $params)
    {
        $visitor = \XF::visitor();
        if ($visitor->user_id == 0) {
            throw $this->exception(
                $this->error(\XF::phrase("fs_escrow_not_allowed"))
            );
        }


        $viewpParams = [
            'pageSelected' => 'escrow/deposit',
        ];
        return $this->view('FS\Escrow', 'fs_escrow_deposit', $viewpParams);
    }

    public function actionDepositSave(ParameterBag $params)
    {
        $this->insertTransaction();

        return $this->redirect(
            $this->getDynamicRedirect($this->buildLink('escrow/deposit'), false)
        );
    }

    protected function insertTransaction()
    {
        $inputs = $this->filterDepositeAmountInputs();

        $visitor = \XF::visitor();

        $visitor->fastUpdate('deposit_amount', ($visitor->deposit_amount + $inputs['deposit_amount']));

        $escrowService = \xf::app()->service('FS\Escrow:Escrow\EscrowServ');

        $escrowService->escrowTransaction($visitor->user_id, $inputs['deposit_amount'], $visitor->deposit_amount, 'Deposit');

        return true;
    }

    protected function filterDepositeAmountInputs()
    {
        $input = $this->filter([
            'deposit_amount' => 'int',
        ]);

        if ($input['deposit_amount'] > 0) {
            return $input;
        }

        throw $this->exception(
            $this->notFound(\XF::phrase("fs_escrow_amount_required"))
        );
    }


    public function actionMyEscrow(ParameterBag $params)
    {
        $visitor = \XF::visitor();
        if ($visitor->user_id == 0) {
            throw $this->exception(
                $this->error(\XF::phrase("fs_escrow_not_allowed"))
            );
        }

        $escrows = $this->finder('FS\Escrow:Escrow')->where('user_id', $visitor->user_id);

        $viewpParams = [
            'escrows' => $escrows->fetch(),
        ];
        return $this->view('FS\Escrow', 'fs_escrow_escrow_list', $viewpParams);
    }

    public function actionMentionedEscrow(ParameterBag $params)
    {
        $visitor = \XF::visitor();
        if ($visitor->user_id == 0) {
            throw $this->exception(
                $this->error(\XF::phrase("fs_escrow_not_allowed"))
            );
        }

        $escrows = $this->finder('FS\Escrow:Escrow')->where('to_user', $visitor->user_id);

        $viewpParams = [
            'escrows' => $escrows->fetch(),


        ];
        return $this->view('FS\Escrow', 'fs_escrow_escrow_list', $viewpParams);
    }
    public function actionLogs(ParameterBag $params)
    {
        $visitor = \XF::visitor();
        if ($visitor->user_id == 0) {
            throw $this->exception(
                $this->error(\XF::phrase("fs_escrow_not_allowed"))
            );
        }
        $page = $this->filterPage();
        $perPage = 2;
        $logs = $this->finder('FS\Escrow:Transaction')->where('user_id', $visitor->user_id);
        // $logs->limitByPage($page, $perPage);
        $viewpParams = [

            'logs' => $logs->fetch(),
            // 'page'=>$page,
            // 'perPage'=>$perPage,
            // 'total' => $logs->total(),

        ];
        return $this->view('FS\Escrow', 'fs_escrow_logs', $viewpParams);
    }

    public function actionCancel(ParameterBag $params)
    {

        $escrow = $this->assertDataExists($params->escrow_id);


        if ($this->isPost()) {
            $this->cancelEscrow($escrow);

            return $this->redirect(
                $this->getDynamicRedirect($this->buildLink('escrow'), $escrow->Thread)
            );
        } else {

            $viewParams = [
                'escrow' => $escrow,
            ];
            return $this->view('FS\Escrow:Escrow\Cancel', 'fs_escrow_cancel', $viewParams);
        }
    }


    public function actionApprove(ParameterBag $params)
    {
        $escrow = $this->assertDataExists($params->escrow_id);

        if ($this->isPost()) {

            $this->approveEscrow($escrow);

            return $this->redirect(
                $this->getDynamicRedirect($this->buildLink('escrow'), $escrow->Thread)
            );
        } else {

            $viewParams = [
                'escrow' => $escrow,
            ];
            return $this->view('FS\Escrow:Escrow\Approve', 'fs_escrow_approve', $viewParams);
        }
    }

    public function actionPayments(ParameterBag $params)
    {
        $escrow = $this->assertDataExists($params->escrow_id);

        /** @var \XF\ControllerPlugin\Delete $plugin */
        $plugin = $this->plugin('XF:Delete');

        if ($this->isPost()) {

            $this->paymentEscrow($escrow);

            return $this->redirect(
                $this->getDynamicRedirect($this->buildLink('escrow'), $escrow->Thread)
            );
        } else {

            $viewParams = [
                'escrow' => $escrow,
            ];
            return $this->view('FS\Escrow:Escrow\Payments', 'fs_escrow_payment', $viewParams);
        }
    }

    protected function cancelEscrow($escrow)
    {
        $visitor = \XF::visitor();

        if ($escrow->user_id != $visitor->user_id && $escrow->to_user != $visitor->user_id) {
            throw $this->exception(
                $this->error(\XF::phrase("fs_escrow_not_allowed"))
            );
        }

        if ($escrow->user_id != $visitor->user_id) {
            $visitor = $this->em()->findOne('XF:User', ['user_id' => $escrow->user_id]);
        }

        if ($escrow) {
            $visitor->fastUpdate('deposit_amount', ($visitor->deposit_amount + ($escrow->Transaction->transaction_amount + intval($this->app()->options()->fs_escrow_applicable_forum))));

            $escrowService = \xf::app()->service('FS\Escrow:Escrow\EscrowServ');

            $escrowService->escrowTransaction($visitor->user_id, ($escrow->Transaction->transaction_amount + intval($this->app()->options()->fs_escrow_applicable_forum)), $visitor->deposit_amount, 'Cancel');

            $visitor = \XF::visitor();

            if ($escrow->user_id == $visitor->user_id) {
                // $escrow->fastUpdate('escrow_status', '3');
                $escrow->bulkSet([
                    'escrow_status' => '3',
                    'last_update' => \XF::$time,
                ]);
            } else {
                // $escrow->fastUpdate('escrow_status', '2');
                $escrow->bulkSet([
                    'escrow_status' => '2',
                    'last_update' => \XF::$time,
                ]);
            }

            $escrow->save();
            // $escrow->fastUpdate('last_update', \XF::$time);
        }
    }

    protected function approveEscrow($escrow)
    {
        $visitor = \XF::visitor();

        if ($escrow->to_user != $visitor->user_id) {
            throw $this->exception(
                $this->error(\XF::phrase("fs_escrow_not_allowed"))
            );
        }

        $escrow->bulkSet([
            'escrow_status' => '1',
            'last_update' => \XF::$time,
        ]);
        $escrow->save();

        // $escrow->fastUpdate('escrow_status', '1');

        // $escrow->fastUpdate('last_update', \XF::$time);
    }

    protected function paymentEscrow($escrow)
    {
        $visitor = \XF::visitor();

        if ($escrow->user_id != $visitor->user_id) {
            throw $this->exception(
                $this->error(\XF::phrase("fs_escrow_not_allowed"))
            );
        }
        $user = $this->em()->findOne('XF:User', ['user_id' => $escrow->to_user]);

        $user->fastUpdate('deposit_amount', ($user->deposit_amount + $escrow->escrow_amount));

        $escrowService = \xf::app()->service('FS\Escrow:Escrow\EscrowServ');

        $escrowService->escrowTransaction($user->user_id, $escrow->escrow_amount, $user->deposit_amount, 'Payment');

        // $escrow->fastUpdate('escrow_status', '4');
        // $escrow->fastUpdate('last_update', \XF::$time);

        $escrow->bulkSet([
            'escrow_status' => '4',
            'last_update' => \XF::$time,
        ]);
        $escrow->save();
    }

    /**
     * @param string $id
     * @param array|string|null $with
     * @param null|string $phraseKey
     *
     * @return \FS\Escrow\Entity\Escrow
     */
    protected function assertDataExists($id, array $extraWith = [], $phraseKey = null)
    {
        return $this->assertRecordExists('FS\Escrow:Escrow', $id, $extraWith, $phraseKey);
    }
}
