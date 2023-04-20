<?php

namespace FS\ApproveThreadPost\Entity;

use XF\Mvc\Entity\Structure;

class Forum extends XFCP_Forum
{
    public function getNewContentState(\XF\Entity\Thread $thread = null)
    {
        $visitor = \XF::visitor();

        if ($visitor->user_id && $visitor->hasNodePermission($this->node_id, 'approveUnapprove')) {
            return 'visible';
        }

        if ($thread) {
            if (!$visitor->hasPermission('approvePost', 'approve_post')) {
                return 'moderated';
            }
        } else {
            if (!$visitor->hasPermission('approveThread', 'approve_thread')) {
                return 'moderated';
            }
        }

        if ($thread) {
            return $this->moderate_replies ? 'moderated' : 'visible';
        } else {
            return $this->moderate_threads ? 'moderated' : 'visible';
        }
    }
}
