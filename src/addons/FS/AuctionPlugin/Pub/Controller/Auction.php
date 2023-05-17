<?php

namespace FS\AuctionPlugin\Pub\Controller;

use XF\Mvc\ParameterBag;
use XF\Pub\Controller\AbstractController;

class Auction extends AbstractController
{

    public function actionIndex(ParameterBag $params)
    {
        return $this->message("Index page. Template not created yet.");

        $viewpParams = [];

        return $this->view('FS\AuctionPlugin', 'index_Auction', $viewpParams);
    }

    public function actionAdd(ParameterBag $params)
    {
        $data = $this->em()->create('FS\AuctionPlugin:Bidding');

        return $this->actionAddEdit($data, $params);
    }

    public function actionEdit(ParameterBag $params)
    {
        /** @var \FS\AuctionPlugin\Entity\Bidding $data */
        $data = $this->assertDataExists($params->auction_id);

        return $this->actionAddEdit($data, $params);
    }

    public function actionAddEdit(\FS\AuctionPlugin\Entity\Bidding $data, $params)
    {
        $options = \XF::options();
        $bidIncreaments = $options->minimumBidIncreament;

        $bidIncreamentsArray = explode("\n", $bidIncreaments);

        $timeZones = $options->auction_TimeZone;

        $timeZonesArray = explode("\n", $timeZones);

        $paymentMethodOptions = $options->paymentOptions;

        $paymentMethodOptionsArray = explode("\n", $paymentMethodOptions);

        $auctionPrefixId = $options->auction_thread_prefix_id;

        $shipsVia = $this->finder('FS\AuctionPlugin:ShipsVia')->fetch();

        $shipTerms = $this->finder('FS\AuctionPlugin:ShipTerms')->fetch();

        $prefixMap[] = $this->finder('XF:ThreadPrefix')
            ->fetch()->toArray();

        $attachmentRepo = $this->repository('XF:Attachment');
        $attachmentData = $attachmentRepo->getEditorData('fs_auction', $data);

        $viewParams = [
            'category' => $params,
            'data' => $data,

            'shipsVia' => $shipsVia,
            'shipTerms' => $shipTerms,
            'timeZones' => $timeZonesArray,
            'bidIncreaments' => $bidIncreamentsArray,
            'paymentMethods' => $paymentMethodOptionsArray,
            'auctionPrefixId' => $auctionPrefixId,

            'attachmentData' => $attachmentData,
            'attachment_time' => $attachmentData['attachments'] ? end($attachmentData['attachments'])->attach_date : '',

            'prefixes' => $prefixMap,
        ];

        return $this->view('FS\AuctionPlugin:Bidding\Add', 'addEdit_Auction', $viewParams);
    }

    public function actionSave(ParameterBag $params)
    {

        if ($params->auction_id) {
            $editAdd = $this->assertDataExists($params->auction_id);
        } else {
            $editAdd = $this->em()->create('FS\AuctionPlugin:Bidding');
        }

        $this->saveProcess($editAdd);

        $hash = $this->filter('attachment_hash', 'str');


        $sql = "Update xf_attachment set content_id=$editAdd->auction_id where temp_hash='$hash'";
        $db = \XF::db();
        $db->query($sql);


        $attachments = $this->finder('XF:Attachment')->where('temp_hash', $hash)->fetch();
        foreach ($attachments as $attachment) {
            $attachment->temp_hash = '';
            $attachment->unassociated = 0;
            $attachment->save();
        }


        return $this->redirect($this->buildLink('auction'));
    }


    protected function saveProcess(\FS\AuctionPlugin\Entity\Bidding $data)
    {
        $input = $this->filterInputs();

        $visitor = \XF::visitor();

        $message = $this->plugin('XF:Editor')->fromInput('message');

        $data->category_id = $input['category_id'];
        $data->title = $input['title'];
        $data->content = $message;
        $data->user_id = $visitor->user_id;
        $data->prefix_id = $input['prefix_id'];
        $data->ends_on = strtotime($input['ends_on']);
        $data->created_date = \XF::$time;
        $data->timezone = $input['timezone'];
        $data->starting_bid = $input['starting_bid'];
        $data->bid_increament = $input['bid_increament'];
        $data->shipping_term = $input['shipping_term'];
        $data->ships_via = $input['ships_via'];
        $data->auction_guidelines = $input['auction_guidelines'];
        $data->bumping_rules = $input['bumping_rules'];
        $data->watch_thread = $input['watch_thread'];
        $data->receive_email = $input['receive_email'];
        $data->payment_methods = $input['payment_methods'];

        if ($data->auction_id == null) {
            $bidCounter = $this->finder('FS\AuctionPlugin:Category')->whereId($input['category_id'])->fetchOne();

            $increament = $bidCounter->bid_count + 1;

            $bidCounter->fastUpdate('bid_count', $increament);
        }

        $data->save();
    }

    protected function filterInputs()
    {
        $input = $this->filter([
            'category_id' => 'int',
            'title' => 'str',
            'prefix_id' => 'int',
            'ends_on' => 'str',
            'timezone' => 'str',
            'starting_bid' => 'int',
            'bid_increament' => 'int',
            'shipping_term' => 'str',
            'ships_via' => 'str',
            'auction_guidelines' => 'bool',
            'bumping_rules' => 'bool',
            'receive_email' => 'bool',
            'watch_thread' => 'bool',
            'payment_methods' => 'array',
        ]);

        if ($input['title'] != '') {
            return $input;
        }

        throw $this->exception(
            $this->notFound(\XF::phrase("fs_filled_reqired_fields_auction"))
        );
    }

    public function actionDelete(ParameterBag $params)
    {
        $replyExists = $this->assertDataExists($params->auction_id);

        /** @var \XF\ControllerPlugin\Delete $plugin */
        $plugin = $this->plugin('XF:Delete');

        if ($this->isPost()) {

            $this->deleteAndDecreament($replyExists, true);

            $attachments = $this->finder('XF:Attachment')->where('content_type', 'fs_auction')->where('content_id', $params->auction_id)->fetch();

            if (count($attachments)) {

                foreach ($attachments as $attachment) {

                    $path = \XF::getRootDirectory() . $this->getAbstractDepositAttachmentPath($attachment->Data->file_hash, $attachment->attachment_id);

                    if (file_exists($path)) {

                        $this->App()->fs()->delete($this->getAbstractCustomAttachmentPath($attachment->Data->file_hash, $attachment->attachment_id));
                    }
                    $attachment->delete();
                }
            }

            return $this->redirect($this->buildLink('auction'));
        }

        return $plugin->actionDelete(
            $replyExists,
            $this->buildLink('auction/categories/delete', $replyExists),
            null,
            $this->buildLink('auction'),
            "{$replyExists->title}"
        );
    }

    protected function deleteAndDecreament(\FS\AuctionPlugin\Entity\Bidding $data)
    {

        $bidCounter = $this->finder('FS\AuctionPlugin:Category')->whereId($data['category_id'])->fetchOne();

        $decreament = $bidCounter->bid_count - 1;

        $bidCounter->fastUpdate('bid_count', $decreament);
        $data->delete();
    }

    protected function requiredOptions()
    {

        $options = \XF::options();
        $bidIncreaments = $options->minimumBidIncreament;

        $bidIncreamentsArray = explode("\n", $bidIncreaments);

        $timeZones = $options->auction_TimeZone;

        $timeZonesArray = explode("\n", $timeZones);

        $paymentMethodOptions = $options->paymentOptions;

        $paymentMethodOptionsArray = explode("\n", $paymentMethodOptions);

        $auctionPrefixId = $options->auction_thread_prefix_id;

        $shipsVia = $this->finder('FS\AuctionPlugin:ShipsVia')->fetch();

        $shipTerms = $this->finder('FS\AuctionPlugin:ShipTerms')->fetch();

        $prefixMap[] = $this->finder('XF:ThreadPrefix')
            ->fetch()->toArray();


        $options = [
            'shipsVia' => $shipsVia,
            'shipTerms' => $shipTerms,
            'timeZones' => $timeZonesArray,
            'bidIncreaments' => $bidIncreamentsArray,
            'paymentMethods' => $paymentMethodOptionsArray,
            'auctionPrefixId' => $auctionPrefixId,

            'prefixes' => $prefixMap,
        ];

        return $options;
    }

    public function actionArchive(ParameterBag $params)
    {




        /** @var \Z61\Classifieds\ControllerPlugin\Overview $overviewPlugin */
        $overviewPlugin = $this->plugin('Z61\Classifieds:Overview');

        $categoryParams = $overviewPlugin->getCategoryListData();
        //$viewableCategoryIds = $categoryParams['categories']->keys();

        //$listParams = $overviewPlugin->getCoreListData($viewableCategoryIds);

        //$this->assertValidPage($listParams['page'], $listParams['perPage'], $listParams['total'], 'classifieds');
        //$this->assertCanonicalUrl($this->buildLink('classifieds/auction/archive', null, ['page' => $listParams['page']]));

        // $viewParams = $categoryParams


        $listings = [
            [
                "id" => 1,
                "img" => 'http://localhost/xenforo/data/attachments/0/7-b7a23a788d296087c1e353700d3bbe8b.jpg',
                "created_date" => 1681117716,
                "expired_date" => 1683797716,
                "username" => 'admin',
                "title" => 'title 1 of auction here',

                "prefix_id" => 1,

                "start_bid" => 200,
                "User" => \XF::visitor(),
                "category" => 'category name',
                "content" => 'content here ',
                "side_bar" => 'side bar',

            ],
            [
                "title" => 'title  2 of auction  here',

                "id" => 2,
                "img" => 'http://localhost/xenforo/data/attachments/0/10-1828d61e931f13be59fce9d15dc5f6b8.jpg',
                "created_date" => 1681117716,
                "expired_date" => 1699677316,
                "username" => 'admin',
                "prefix_id" => 2,
                "start_bid" => 300,
                "User" => \XF::visitor(),
                "category" => 'category name',
                "content" => 'content here ',
                "side_bar" => 'side bar',

            ],
            [
                "title" => 'title  3 of auction  here',
                "id" => 3,
                "img" => 'http://localhost/xenforo/data/attachments/0/10-1828d61e931f13be59fce9d15dc5f6b8.jpg',
                "created_date" => 1681217716,
                "expired_date" => 1692671316,
                "username" => 'admin',
                "prefix_id" => 2,
                "start_bid" => 300,
                "User" => \XF::visitor(),
                "category" => 'category 3 name',
                "content" => 'content 3 here ',
                "side_bar" => 'side bar',

            ],
            [
                "id" => 4,
                "img" => 'http://localhost/xenforo/data/attachments/0/7-b7a23a788d296087c1e353700d3bbe8b.jpg',
                "created_date" => 1681117716,
                "expired_date" => 1683797716,
                "username" => 'admin',
                "title" => 'title 4 of auction here',

                "prefix_id" => 1,

                "start_bid" => 200,
                "User" => \XF::visitor(),
                "category" => 'category 4 name',
                "content" => 'content 4 here ',
                "side_bar" => 'side bar',

            ],
            [
                "title" => 'title  5 of auction  here',
                "id" => 5,
                "img" => 'http://localhost/xenforo/data/attachments/0/10-1828d61e931f13be59fce9d15dc5f6b8.jpg',
                "created_date" => 1681217716,
                "expired_date" => 1692671316,
                "username" => 'user',
                "prefix_id" => 2,
                "start_bid" => 300,
                "User" => \XF::visitor(),
                "category" => 'category 5 name',
                "content" => 'content 5 here ',
                "side_bar" => 'side bar',

            ],
            [
                "title" => 'title  6 of auction  here',

                "id" => 6,
                "img" => 'http://localhost/xenforo/data/attachments/0/10-1828d61e931f13be59fce9d15dc5f6b8.jpg',
                "created_date" => 1681117716,
                "expired_date" => 1699677316,
                "username" => 'admin',
                "prefix_id" => 2,
                "start_bid" => 300,
                "User" => \XF::visitor(),
                "category" => 'category 6 name',
                "content" => 'content 6 here ',
                "side_bar" => 'side bar',

            ],

        ];

        $myCategories = [
            [
                "category_id" => 1,
                "title" => 'title 1',
                "description" => '1681117716',
                "parent_category_id" => 0,
                "display_order" => 2,
                "depth" => 1,
                "lft" => 1,
                "rgt" => 4,
                "bid_count" => 4,



            ],
            [
                "category_id" => 2,
                "title" => '2title 2',
                "description" => '1681117716',
                "parent_category_id" => 0,
                "display_order" => 1,
                "depth" => 1,
                "lft" => 1,
                "rgt" => 1,
                "bid_count" => 4,

            ],

        ];

        $myCategoriesExtra = [
            [
                "listing_count" => 1,
                "catTittle" => 'catTittle',

                "childCount" => 3,
                "last_listing_date" => 1681117716,
                "last_listing_title" => 'sell item in custom list',
                "last_listing_id" => 2,

            ],
            [
                "listing_count" => 0,
                "childCount" => 10,
                "catTittle" => 'catTittle',

                "last_listing_date" => 1681217716,
                "last_listing_title" => 'sell item in custom list',
                "last_listing_id" => 2,

            ],   [
                "listing_count" => 4,
                "catTittle" => 'catTittle',

                "childCount" => 12,
                "last_listing_date" => 1681317716,
                "last_listing_title" => 'sell item in custom list',
                "last_listing_id" => 2,

            ],

        ];
        $categoryTree = [
            [
                4 => 4,
                2 => 2,
            ],
            [
                4 => 4,
                2 => 2,
                [
                    4 => 4,
                    2 => 2,
                ],
            ],

            [
                13 => 13,


            ],
        ];
        $viewParams = $categoryParams;

        //$viewParams = ['categoryParams'=>$categoryParams,'myCategories'=> $myCategories];

        //$viewParams = ['listings' => $listings];
        //$viewParams = $categoryParams;

        //$viewParams = ['categoryTree' => $categoryTree,'categoryExtras' => $myCategoriesExtra];

        //var_dump(gettype($myCategories));

        //echo '<pre>';
        //var_dump($listings);exit;
        // var_dump($listParams);exit;
        //var_dump($categoryParams);exit;



        return $this->view('FS\AuctionPlugin', 'fs_auctionArchive', $viewParams);
    }

    public function getAbstractDepositAttachmentPath($hash, $id)
    {
        $path = sprintf('/data/attachments/0/' . $id . '-' . $hash . '.jpg');
        return $path;
    }

    public function getAbstractCustomAttachmentPath($hash, $id)
    {
        $path = sprintf('data://attachments/0/' . $id . '-' . $hash . '.jpg');

        return $path;
    }

    /**
     * @param string $id
     * @param array|string|null $with
     * @param null|string $phraseKey
     *
     * @return \FS\AuctionPlugin\Entity\Bidding
     */
    protected function assertDataExists($id, array $extraWith = [], $phraseKey = null)
    {
        return $this->assertRecordExists('FS\AuctionPlugin:Bidding', $id, $extraWith, $phraseKey);
    }
}
