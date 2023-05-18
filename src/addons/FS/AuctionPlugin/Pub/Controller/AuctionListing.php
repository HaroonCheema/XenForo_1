<?php

namespace FS\AuctionPlugin\Pub\Controller;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use XF\Entity\User;
use XF\Mvc\ParameterBag;
use XF\Mvc\Reply\View;
use Z61\Classifieds\Entity\Condition;
use Z61\Classifieds\Entity\ListingType;
use Z61\Classifieds\Notifier\Listing\FeedbackGiven;
use Z61\Classifieds\Notifier\Listing\Sold;

use XF\Pub\Controller\AbstractController;

class AuctionListing extends AbstractController
{

    public function actionIndex(ParameterBag $params)
    {
        $categories = $this->finder('FS\AuctionPlugin:Category')->fetch();
        $categoryTree = $this->createCategoryTree($categories);

        $finder = $this->finder('FS\AuctionPlugin:AuctionListing');

        if ($this->filter('search', 'uint')) {
            $finder = $this->getCrudSearchFinder();

            if (count($finder->getConditions()) == 0) {
                return $this->error(\XF::phrase('please_complete_required_field'));
            }
        } else if ($params->category_id) {
            $finder->where('category_id', $params->category_id);
        } else {
            $finder->order('auction_id', 'DESC');
        }

        $viewParams = [
            'categories' => $categories,
            'categoryTree' => $categoryTree,
            'listings' => $finder->fetch(),
            'conditions' => $this->filterSearchConditions(),
        ];

        return $this->view('FS\AuctionPlugin:AuctionListing', 'fs_auctionArchive', $viewParams);
    }

    public function actionViewAuction(ParameterBag $params)
    {
        $auction = $this->Finder('FS\AuctionPlugin:AuctionListing')->whereId($params->auction_id)->fetchOne();
        if (!$auction) {
            return $this->error('data not found');
        }
        $dropDownListLimit = 10;

        $viewParams = [
            'auction' => $auction,
            'dropDownListLimit' => $dropDownListLimit,

        ];
        return $this->view(
            'FS\AuctionPlugin',
            'fs_auction_view_single',
            $viewParams
        );
    }

    protected function getCrudSearchFinder()
    {
        $conditions = $this->filterSearchConditions();

        $finder = $this->finder('FS\AuctionPlugin:AuctionListing');

        if ($conditions['fs_auction_username'] != '') {

            $User = $this->finder('XF:User')->where('username', $conditions['fs_auction_username'])->fetchOne();
            if ($User) {
                $finder->where('user_id', $User['user_id']);
            }
        }

        if ($conditions['fs_auction_status'] != 'all') {
            $finder->where('auction_status', $conditions['fs_auction_status']);
        }

        if ($conditions['fs_auction_cat'] != '0') {
            $finder->where('category_id', $conditions['fs_auction_cat']);
        }

        return $finder;
    }

    /**
     * @param null $categories
     * @param int $rootId
     *
     * @return \XF\Tree
     */
    public function createCategoryTree($categories = null, $rootId = 0)
    {
        if ($categories === null) {
            $categories = $this->findCategoryList()->fetch();
        }
        return new \XF\Tree($categories, 'parent_category_id', $rootId);
    }

    public function actionViewType(ParameterBag $params)
    {
        $visitor = \XF::visitor();

        if ($visitor->user_id != 0 && $visitor->layout_type != $params->category_id) {

            $visitor->fastUpdate('layout_type', $params->category_id);
        }

        return $this->redirect(
            $this->getDynamicRedirect($this->buildLink('auction'), false)
        );
    }

    public function actionAddListingChooser()
    {
        /** @var \FS\AuctionPlugin\XF\Entity\User $visitor */
        $visitor = \XF::visitor();
        if (!$visitor->canAddClassified()) {
            return $this->noPermission();
        }
        $this->assertCanonicalUrl($this->buildLink('auction/add-listing-chooser'));

        $finder = $this->finder('FS\AuctionPlugin:Category')->order('category_id', 'DESC')->fetch();


        if ($finder->count() < 0) {
            return $this->error(\XF::phrase('fs_auction_no_categories_exist_at_this_time'));
        }

        $finder = $this->finder('FS\AuctionPlugin:Category')->order('category_id', 'DESC')->fetch();


        $viewParams = [
            'categories' => $finder
        ];

        return $this->view('FS\AuctionPlugin:Auction\AddListingChooser', 'fs_auction_categories_add_listing_chooser', $viewParams);
    }

    public function actionAdd(ParameterBag $params)
    {
        return $this->rerouteController('FS\AuctionPlugin:AuctionListing', 'addListingChooser', $params);
    }

    public function actionRefineSearch(ParameterBag $params)
    {
        $categories = $this->finder('FS\AuctionPlugin:Category')->fetch();

        $viewParams = [
            'conditions' => $this->filterSearchConditions(),
            'categories' => $categories,
        ];

        return $this->view('FS\AuctionPlugin:AuctionListing\RefineSearch', 'fs_auction_search_filter', $viewParams);
    }

    protected function filterSearchConditions()
    {
        return $this->filter([
            'fs_auction_username' => 'str',
            'fs_auction_status' => 'str',
            'fs_auction_cat' => 'str',
        ]);
    }

    protected function getCategoryRepo()
    {
        return $this->repository('FS\AuctionPlugin:Category');
    }
}
