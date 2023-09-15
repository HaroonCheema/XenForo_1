<?php

namespace FS\WebsiteRanking\XF\Repository;

use XF\Mvc\ParameterBag;

class Thread extends XFCP_Thread
{
    /**
     * @return \XF\Finder\Thread
     */
    public function findThreadsWithLatestPosts()
    {
        $finder = parent::findThreadsWithLatestPosts();

        $parentNodeId = intval(\xf::app()->options()->fs_web_ranking_parent_web_id);

        if ($parentNodeId) {

            $nodeFinder = \xf::finder('XF:Node')->where("parent_node_id", $parentNodeId);
            $tempNodeIds = $nodeFinder->pluckfrom('node_id')->fetch()->toArray();

            $tempNodeIds[] = $parentNodeId;

            return $finder->where('node_id', '!=', $tempNodeIds);
        }

        return $finder;
    }
}
