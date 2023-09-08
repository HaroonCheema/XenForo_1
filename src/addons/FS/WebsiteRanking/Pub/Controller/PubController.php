<?php

namespace FS\WebsiteRanking\Pub\Controller;

use XF\Mvc\ParameterBag;
use XF\Pub\Controller\AbstractController;
use XF\Mvc\RouteMatch;
use db;

class PubController extends AbstractController
{

    public function actionIndex(ParameterBag $params)
    {
        //         $escrowService = \xf::app()->service('FS\Escrow:Escrow\EscrowServ');

        //         // $enc_user_amount = $escrowService->encrypt($escrowService->licenseData(50.00));
        // //       $dec_escrow_amount = $escrowService->decrypt('7b22616d6f756e74223a352c22616d6f756e745f74797065223a22425443227d');
        //        $res = $escrowService->getTransactionList();

        // echo '<pre>';
        //          var_dump($res);exit;


        // $visitor = \XF::visitor();
        // $rules[] = [
        //     'message' => \XF::phrase('fs_escrow_rules'),
        //     "display_image" => "avatar",
        //     "display_style" => "primary",

        // ];

        // if ($this->filter('search', 'uint') || $this->filterSearchConditions()) {
        //     $finder = $this->getSearchFinder();
        // } else {
        //     $finder = $this->finder('FS\Escrow:Escrow')->where('thread_id', '!=', 0)->whereOr([['to_user', $visitor->user_id], ['user_id' => $visitor->user_id]]);
        // }


        // $page = $this->filterPage($params->page);
        // $perPage = 15;
        // $finder->limitByPage($page, $perPage);
        // $viewpParams = [
        //     'rules' => $rules,
        //     'page' => $page,
        //     'total' => $finder->total(),
        //     'perPage' => $perPage,
        //     'stats' => $this->auctionStatistics(),
        //     'escrowsCount' => $this->auctionEscrowCount(),
        //     'escrows' => $finder->order('last_update', 'desc')->fetch(),
        //     'conditions' => $this->filterSearchConditions(),
        //     'isSelected' => $this->filter(['type' => 'str']),

        // ];

        return $this->message('Hello Pub Controller');

        // return $this->view('FS\Escrow', 'fs_escrow_landing', $viewpParams);
        // return $this->view('FS\Escrow', 'fs_escrow_landing', $viewpParams);
    }
}
