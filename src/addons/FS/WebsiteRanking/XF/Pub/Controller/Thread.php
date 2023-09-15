<?php

namespace FS\WebsiteRanking\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

class Thread extends XFCP_Thread
{
    public function actionSolved(ParameterBag $params)
    {
        $visitor = \XF::visitor();
        if (!($visitor->user_id || \XF::visitor()->is_admin)) {
            return $this->noPermission();
        }

        $thread = $this->assertViewableThread($params->thread_id);

        if ($visitor->user_id != $thread->user_id) {
            throw $this->exception($this->notFound(\XF::phrase('do_not_have_permission')));
        }

        if ($thread->Forum->Node->parent_node_id != \xf::app()->options()->fs_web_ranking_parent_web_id) {
            return $this->noPermission();
        }

        if ($this->isPost()) {

            $thread->fastUpdate('issue_status', 1);

            $redirect = $this->redirect($this->buildLink('threads', $thread));
            return $redirect;
        } else {

            $viewParams = [
                'thread' => $thread,
            ];
            return $this->view('XF:Thread\Solved', 'fs_web_ranking_solved', $viewParams);
        }
    }
}
