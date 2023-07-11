<?php

namespace FS\Escrow\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

class Forum extends XFCP_Forum
{
    public function actionIndex(ParameterBag $params)
    {
        if ($params->node_id ==  $this->app()->options()->fs_escrow_applicable_forum) {

            return $this->redirect($this->buildLink('escrow/'), '');
        }

        return parent::actionIndex($params);
    }

    protected function setupThreadCreate(\XF\Entity\Forum $forum)
    {
        // $visitor = \XF::visitor();

        // var_dump($this->filter('escrow_amount', 'uint'));
        // exit;
        $parent = parent::setupThreadCreate($forum);


        $visitor = \XF::visitor();


        if ($forum->node_id ==  intval($this->app()->options()->fs_escrow_applicable_forum) && $visitor->deposit_amount < $this->filter('escrow_amount', 'uint')) {
            throw $this->exception(
                $this->error(\XF::phrase("fs_escrow_not_enough_amount"))
            );
        }

        // if (
        //     $forum->node_id ==  intval($this->app()->options()->fs_escrow_applicable_forum) && $visitor->deposit_amount >=

        //     $this->filter('escrow_amount', 'uint')
        // ) {



        //     $visitor->fastUpdate('deposit_amount', ($visitor->deposit_amount - $this->filter('escrow_amount', 'uint')));

        //     $transaction = $this->em()->create('FS\Escrow:Transaction');

        //     $transaction->user_id = $visitor->user_id;
        //     $transaction->transaction_amount = $this->filter('escrow_amount', 'uint');
        //     $transaction->transaction_type = 'Withraw';
        //     $transaction->current_amount = $visitor->deposit_amount;

        //     $transaction->save();
        // } else {

        //     return $parent;
        // }




        $options = $this->app()->options();

        if ($forum->node_id ==  $options->fs_escrow_applicable_forum) {

            $inputs = $this->filter([
                'to_user' => 'str',
                'escrow_amount' => 'int',
            ]);

            $user = $this->em()->findOne('XF:User', ['username' => $inputs['to_user']]);

            if ($user) {

                $visitor->fastUpdate('deposit_amount', ($visitor->deposit_amount - $this->filter('escrow_amount', 'uint')));

                $transaction = $this->em()->create('FS\Escrow:Transaction');

                $transaction->user_id = $visitor->user_id;
                $transaction->transaction_amount = $this->filter('escrow_amount', 'uint');
                $transaction->transaction_type = 'Freeze';
                $transaction->current_amount = $visitor->deposit_amount;

                $transaction->save();

                $escrowRecord = $this->em()->create('FS\Escrow:Escrow');

                $escrowRecord->to_user = $user->user_id;
                $escrowRecord->user_id = $visitor->user_id;
                $escrowRecord->escrow_amount = $inputs['escrow_amount'];
                $escrowRecord->transaction_id = $transaction->transaction_id;

                $escrowRecord->save();

                $parent->setEscrowId($escrowRecord->escrow_id);
            }
        }

        return $parent;
    }

    protected function finalizeThreadCreate(\XF\Service\Thread\Creator $creator)
    {
        $parent = parent::finalizeThreadCreate($creator);

        $thread = $creator->getThread();

        $options = $this->app()->options();

        if ($thread->node_id ==  $options->fs_escrow_applicable_forum) {

            $escrow = $this->em()->findOne('FS\Escrow:Escrow', ['escrow_id' => $thread['escrow_id']]);
            $user = $this->em()->findOne('XF:User', ['user_id' => $escrow['to_user']]);

            // $newState = 'watch_email';

            $newState = 'watch_no_email';

            /** @var \XF\Repository\ThreadWatch $watchRepo */
            $watchRepo = $this->repository('XF:ThreadWatch');
            $watchRepo->setWatchState($thread, $user, $newState);

            $escrow->fastUpdate('thread_id', $thread->thread_id);
        }

        return $parent;
    }
}
