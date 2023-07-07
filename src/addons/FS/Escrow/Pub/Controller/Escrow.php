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

        $forum = $this->finder('XF:Forum')->where('node_id', $options->fs_escrow_applicable_forum)->fetchOne();

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

        $transaction = $this->em()->create('FS\Escrow:Transaction');

        $transaction->user_id = $visitor->user_id;
        $transaction->transaction_amount = $inputs['deposit_amount'];
        $transaction->transaction_type = 'Deposit';
        $transaction->current_amount = $visitor->deposit_amount;

        $transaction->save();


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
}
