<?php

namespace FS\Molly\Pub\Controller;

use XF\Mvc\ParameterBag;

use XF\Pub\Controller\AbstractController;

class Molly extends AbstractController
{

    public function actionIndex(ParameterBag $params)
    {
        // $finder = $this->finder('FS\AuctionPlugin:AuctionListing');

        $viewParams = [];

        return $this->view('FS\Molly:Molly\Index', 'fs_molly_index', $viewParams);
    }

    public function actionAdd()
    {

        return $this->message("Add Sub Forum");
    }
}
