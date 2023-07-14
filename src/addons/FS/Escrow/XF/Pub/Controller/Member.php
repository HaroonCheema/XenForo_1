<?php

namespace FS\Escrow\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

class Member extends XFCP_Member
{
    public function actionMyEscrow(ParameterBag $params)
    {
        $visitor = \XF::visitor();
        if ($visitor->user_id == 0) {
            throw $this->exception(
                $this->error(\XF::phrase("fs_escrow_not_allowed"))
            );
        }

        $user = $this->assertViewableUser($params->user_id);
        $escrows = $this->finder('FS\Escrow:Escrow')->where('user_id', $user->user_id)->order('last_update', 'DESC');

        $viewpParams = [
            'escrows' => $escrows->fetch(),
            'type' => 'my',

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
        $user = $this->assertViewableUser($params->user_id);
        $escrows = $this->finder('FS\Escrow:Escrow')->where('to_user', $user->user_id)->order('last_update', 'DESC');
        $viewpParams = [
            'escrows' => $escrows->fetch(),
            'type' => 'mentioned',

        ];
        return $this->view('FS\Escrow', 'fs_escrow_escrow_list', $viewpParams);
    }
    public function actionLogs(ParameterBag $params)
    {
        $user = $this->assertViewableUser($params->user_id);

        $visitor = \XF::visitor();
        if ($visitor->user_id == 0) {
            throw $this->exception(
                $this->error(\XF::phrase("fs_escrow_not_allowed"))
            );
        }
        $page = $this->filterPage();
        $perPage = 2;
        $logs = $this->finder('FS\Escrow:Transaction')->where('user_id', $user->user_id)->order('transaction_id', 'DESC');
        // $logs->limitByPage($page, $perPage);
        $viewpParams = [

            'logs' => $logs->fetch(),
            'page' => $page,
            'perPage' => $perPage,
            'total' => $logs->total(),

        ];
        return $this->view('FS\Escrow', 'fs_escrow_logs', $viewpParams);
    }
}
