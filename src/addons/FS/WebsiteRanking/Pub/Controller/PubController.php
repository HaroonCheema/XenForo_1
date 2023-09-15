<?php

namespace FS\WebsiteRanking\Pub\Controller;

use XF\Mvc\ParameterBag;
use XF\Pub\Controller\AbstractController;
use XF\Mvc\RouteMatch;
use db;

class PubController extends AbstractController
{

    /**
     * @var URL
     */
    public $siteUrl = "web-ranking";

    protected function preDispatchController($action, ParameterBag $params)
    {
        if (!\xf::visitor()->hasPermission('fs_website_ranking', 'check')) {
            throw $this->exception($this->notFound(\XF::phrase('do_not_have_permission')));
        }
    }

    public function actionIndex(ParameterBag $params)
    {
        $this->checkUser();

        $page = $params->page;
        $perPage = 15;

        $nodeFinder = \xf::finder('XF:Node')->where("parent_node_id", \xf::app()->options()->fs_web_ranking_parent_web_id);
        $tempNodeIds = $nodeFinder->pluckfrom('node_id')->fetch()->toArray();

        if ($this->filter('search', 'uint') || $this->filter('fs_web_ranking_complains', 'str')) {
            $nodeIds = $this->getSearchFinder($tempNodeIds);
        } else {
            $forumFinder = \xf::finder('XF:Forum')->where("node_id", $tempNodeIds)->order('message_count', 'DESC');
            $nodeIds = $forumFinder->pluckfrom('node_id')->fetch()->toArray();
        }

        $websiteRankingStatus = '';

        if ($tempNodeIds) {
            $websiteService = \xf::app()->service('FS\WebsiteRanking:WebsiteRankingServ');

            $forumFinder = \xf::finder('XF:Thread')->where("node_id", $tempNodeIds);
            $threadIds = $forumFinder->pluckfrom('thread_id')->fetch()->toArray();

            if ($threadIds) {
                $websiteRankingStatus = $websiteService->getSiteRanking($tempNodeIds);
            }
        }

        $quoteNodeIds = \XF::db()->quote($nodeIds);

        $finder = null;

        if ($quoteNodeIds) {
            $setOrderFinder = \XF::finder('XF:Node');

            $finder = $setOrderFinder->where("node_id", $nodeIds)->order($setOrderFinder->expression('FIELD(node_id, ' . $quoteNodeIds . ')'));
        }

        $finder->limitByPage($page, $perPage);

        $data = $finder->fetch();

        $viewParams = [
            "data" => $data ?: '',
            "totalReturn" => $data ? count($data) : 0,
            // "total" => $data ? count($data) : 0,

            'page' => $page ?: '',
            'perPage' => $perPage ?: '',
            'total' => $finder->total() ?: '',

            "siteUrl" => $this->siteUrl,
            "conditions" => $this->filterSearchConditions(),


            "siteStatus" => $websiteRankingStatus ?: '',
        ];

        return $this->view('FS\WebsiteRanking:PubController\Index', 'fs_web_ranking_index', $viewParams);
    }

    protected function getSearchFinder($tempNodeIds)
    {
        $conditions = $this->filterSearchConditions();

        $complaintData = [];

        foreach ($tempNodeIds as $nodeId) {
            $resolvedComplaintCount = \XF::db()->fetchOne("
        SELECT COUNT(*) 
        FROM xf_thread 
        WHERE node_id = ? 
        AND issue_status = 1
    ", $nodeId);
            $complaintData[$nodeId] = $resolvedComplaintCount;
        }

        if ($conditions['fs_web_ranking_complains'] == 'high') {
            //  for high to low resolution
            arsort($complaintData);
        } else {
            // for low to high resolution
            asort($complaintData);
        }

        return array_keys($complaintData);
    }

    public function actionRefineSearch(ParameterBag $params)
    {
        $viewParams = [
            'conditions' => $this->filterSearchConditions(),
        ];

        return $this->view('FS\WebRanking:PubController\RefineSearch', 'fs_web_ranking_search_filter', $viewParams);
    }

    protected function filterSearchConditions()
    {
        return $this->filter([
            'fs_web_ranking_complains' => 'str',
        ]);
    }

    protected function checkUser()
    {
        if (!\XF::visitor()->user_id) {
            throw $this->exception($this->notFound(\XF::phrase('do_not_have_permission')));
        }
    }
}
