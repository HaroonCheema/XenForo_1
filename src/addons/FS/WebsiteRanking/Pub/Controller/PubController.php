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

    public function actionIndex(ParameterBag $params)
    {
        $this->checkUser();

        $page = $params->page;
        $perPage = 15;

        // if ($params['node_id'] > 0) {
        //     return $this->actionSingleView($params);
        // }

        // /** @var \FS\ForumGroups\Service\ForumGroups\ForumGroupsService $forumGroupService */
        // $forumGroupService = \xf::app()->service('FS\ForumGroups:ForumGroups\ForumGroupsService');

        // $finder = $forumGroupService->currentUserGroups();

        $nodeFinder = \xf::finder('XF:Node')->where("parent_node_id", \xf::app()->options()->fs_web_ranking_parent_web_id);
        $tempNodeIds = $nodeFinder->pluckfrom('node_id')->fetch()->toArray();

        $forumFinder = \xf::finder('XF:Forum')->where("node_id", $tempNodeIds)->order('message_count', 'DESC');
        $nodeIds = $forumFinder->pluckfrom('node_id')->fetch()->toArray();

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
        ];

        return $this->view('FS\WebsiteRanking:PubController\Index', 'fs_web_ranking_index', $viewParams);
    }

    // public function actionIndex(ParameterBag $params)
    // {
    //     //         $escrowService = \xf::app()->service('FS\Escrow:Escrow\EscrowServ');

    //     //         // $enc_user_amount = $escrowService->encrypt($escrowService->licenseData(50.00));
    //     // //       $dec_escrow_amount = $escrowService->decrypt('7b22616d6f756e74223a352c22616d6f756e745f74797065223a22425443227d');
    //     //        $res = $escrowService->getTransactionList();

    //     // echo '<pre>';
    //     //          var_dump($res);exit;


    //     // $visitor = \XF::visitor();
    //     // $rules[] = [
    //     //     'message' => \XF::phrase('fs_escrow_rules'),
    //     //     "display_image" => "avatar",
    //     //     "display_style" => "primary",

    //     // ];

    //     // if ($this->filter('search', 'uint') || $this->filterSearchConditions()) {
    //     //     $finder = $this->getSearchFinder();
    //     // } else {
    //     //     $finder = $this->finder('FS\Escrow:Escrow')->where('thread_id', '!=', 0)->whereOr([['to_user', $visitor->user_id], ['user_id' => $visitor->user_id]]);
    //     // }


    //     // $page = $this->filterPage($params->page);
    //     // $perPage = 15;
    //     // $finder->limitByPage($page, $perPage);
    //     // $viewpParams = [
    //     //     'rules' => $rules,
    //     //     'page' => $page,
    //     //     'total' => $finder->total(),
    //     //     'perPage' => $perPage,
    //     //     'stats' => $this->auctionStatistics(),
    //     //     'escrowsCount' => $this->auctionEscrowCount(),
    //     //     'escrows' => $finder->order('last_update', 'desc')->fetch(),
    //     //     'conditions' => $this->filterSearchConditions(),
    //     //     'isSelected' => $this->filter(['type' => 'str']),

    //     // ];



    //     // return $this->view('FS\Escrow', 'fs_escrow_landing', $viewpParams);
    //     // return $this->view('FS\Escrow', 'fs_escrow_landing', $viewpParams);

    //     return $this->message('Hello Pub Controller');
    // }

    protected function checkUser()
    {
        if (!\XF::visitor()->user_id) {
            throw $this->exception($this->notFound(\XF::phrase('do_not_have_permission')));
        }
    }
}
