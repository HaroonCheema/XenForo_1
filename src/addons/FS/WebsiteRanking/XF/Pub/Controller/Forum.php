<?php

namespace FS\WebsiteRanking\XF\Pub\Controller;

use XF\Mvc\ParameterBag;
use FS\WebsiteRanking\Helper;

class Forum extends XFCP_Forum
{
        protected function finalizeThreadCreate(\XF\Service\Thread\Creator $creator)
        {
                $forum = $creator->getForum();
                 
//                Helper::calculateIssuePercentageOfNode($forum);  // Recalculate issue percentage of this node when new issue create
                
                return parent::finalizeThreadCreate($creator);
        } 
}
