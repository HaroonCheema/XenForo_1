<?php

namespace FS\WebsiteRanking\XF\Entity;

use XF\Mvc\Entity\Structure;

class Forum extends XFCP_Forum
{

    public function getNewContentState(\XF\Entity\Thread $thread = null)
    {

        if (!$thread) {
            if ($this->Node->parent_node_id == \xf::app()->options()->fs_web_ranking_parent_web_id) {
                return 'moderated';
            }
        }

        return  parent::getNewContentState($thread);
    }
}
