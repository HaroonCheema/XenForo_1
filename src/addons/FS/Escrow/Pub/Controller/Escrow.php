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
        $viewpParams = [];
        return $this->view('FS\Escrow', 'fs_escrow_addEdit', $viewpParams);
    }

    public function actionDeposit(ParameterBag $params)
    {
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

        $transaction = $this->em()->create('FS\Escrow:Transaction');

        $transaction->user_id = $visitor->user_id;
        $transaction->transaction_amount = $inputs['deposit_amount'];
        $transaction->current_amount = $visitor->deposit_amount;

        $transaction->save();

        $visitor->fastUpdate('deposit_amount', ($visitor->deposit_amount+$inputs['deposit_amount']));

        return true;
    }

    protected function filterDepositeAmountInputs()
    {
        $input = $this->filter([
            'deposit_amount' => 'int',
        ]);

        if ($input['deposit_amount'] != 0) {
            return $input;
        }

        throw $this->exception(
            $this->notFound(\XF::phrase("fs_escrow_amount_required"))
        );
    }


    public function actionMyEscrow(ParameterBag $params)
    {
        $viewpParams = [];
        return $this->view('FS\Escrow', 'fs_escrow_my_escrow', $viewpParams);
    }

    public function actionMentionedEscrow(ParameterBag $params)
    {
        $viewpParams = [];
        return $this->view('FS\Escrow', 'fs_escrow_mentioned_escrow', $viewpParams);
    }
    public function actionLogs(ParameterBag $params)
    {
        $viewpParams = [];
        return $this->view('FS\Escrow', 'fs_escrow_logs', $viewpParams);
    }
}
