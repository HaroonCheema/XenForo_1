<?php

namespace FS\AuctionPlugin\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

class Forum extends XFCP_Forum
{
    protected function setupThreadCreate(\XF\Entity\Forum $forum)
    {

        $input = $this->filter('category_id', 'uint');

        var_dump($input);
        exit;
        $parent = parent::setupThreadCreate($forum);

        $options = $this->app()->options();

        if ($forum->node_id ==  $options->fs_auction_applicable_forum) {

            $input = $this->filter([
                'ends_on' => 'str',
                'ends_on_time' => 'str',
            ]);

            $tmpTime = explode(':', $input['ends_on_time']);
            $h = $tmpTime[0] * 3600;
            $m = $tmpTime[1] * 60;
            $tmpDate = strtotime($input['ends_on'] . ' 00:00 America/Los_Angeles');

            $end_date_time = ($tmpDate + $h + $m);

            $parent->setauctionDateTime($end_date_time);
        }

        return $parent;
    }

    protected function finalizeThreadCreate(\XF\Service\Thread\Creator $creator)
    {
        $parent = parent::finalizeThreadCreate($creator);



        $thread = $creator->getThread();

        $options = $this->app()->options();

        if ($thread->node_id ==  $options->fs_auction_applicable_forum) {
            $input = $this->filter('category_id', 'int');

            var_dump($input);
            exit;

            $insertInAuction = $this->em()->create('FS\AuctionPlugin:AuctionListing');

            $insertInAuction->category_id = $input['category_id'];
            $insertInAuction->thread_id = $thread['thread_id'];


            $insertInAuction->save();
        }

        return $parent;
    }
}
