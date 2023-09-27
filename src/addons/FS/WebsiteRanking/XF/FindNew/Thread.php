<?php

namespace FS\WebsiteRanking\XF\FindNew;

use XF\Mvc\ParameterBag;
use FS\WebsiteRanking\Helper;

class Thread extends XFCP_Thread
{
    // public function getPageResults(array $ids)
    // {
    //     echo 'elkjsdfkl';
    //     exit;
    //     $ids = array_map('intval', $ids);

    //     $nodeFinder = \xf::finder('XF:Node')->where("parent_node_id", 194);
    //     $tempNodeIds = $nodeFinder->pluckfrom('node_id')->fetch()->toArray();

    //     $tempNodeIds[] = 43;

    //     $forumFinder = \xf::finder('XF:Thread')->where("node_id", $tempNodeIds);
    //     $threadIds = $forumFinder->pluckfrom('thread_id')->fetch()->toArray();

    //     if (!$threadIds) {
    //         return parent::getPageResults($ids);
    //     }

    //     $ids = array_values(array_diff($ids, $threadIds));

    //     $results = $this->getPageResultsEntities($ids);
    //     $results = $this->filterResults($results);
    //     return $results->sortByList($ids);
    // }

    public function getPageResultsEntities(array $ids)
    {
        $visitor = \XF::visitor();

        $ids = array_map('intval', $ids);

        $nodeFinder = \xf::finder('XF:Node')->where("parent_node_id", \xf::app()->options()->fs_web_ranking_parent_web_id);
        $tempNodeIds = $nodeFinder->pluckfrom('node_id')->fetch()->toArray();

        $tempNodeIds[] = \xf::app()->options()->fs_web_ranking_parent_web_id;

        $forumFinder = \xf::finder('XF:Thread')->where("node_id", $tempNodeIds);
        $threadIds = $forumFinder->pluckfrom('thread_id')->fetch()->toArray();

        if (!$threadIds) {
            return parent::getPageResultsEntities($ids);
        }

        $ids = array_values(array_diff($ids, $threadIds));

        /** @var \XF\Finder\Thread $threadFinder */
        $threadFinder = \XF::finder('XF:Thread')
            ->where('thread_id', $ids)
            ->with('fullForum')
            ->with('Forum.Node.Permissions|' . $visitor->permission_combination_id);

        return $threadFinder->fetch();
    }
}
