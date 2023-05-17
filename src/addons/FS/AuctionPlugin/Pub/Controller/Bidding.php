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

class Bidding extends AbstractController
{

    public function actionIndex(ParameterBag $params)
    {
        if ($params->listing_id) {
            return $this->rerouteController(__CLASS__, 'view', $params);
        }

        // $finder = $this->finder('FS\AuctionPlugin:Category')->order('category_id', 'DESC')->fetch();
        // $biddingFinder = $this->finder('FS\AuctionPlugin:Bidding')->order('auction_id', 'DESC')->fetch();

        $categories = $this->finder('FS\AuctionPlugin:Category')->fetch();
        $categoryTree = $this->createCategoryTree($categories);

        $finder = $this->finder('FS\AuctionPlugin:Bidding');

        // ager filter search wala set hai to ye code chaley ga or is k ander wala function or code run ho ga
        if ($this->filter('search', 'uint')) {
            $finder = $this->getCrudSearchFinder();

            if (count($finder->getConditions()) == 0) {
                return $this->error(\XF::phrase('please_complete_required_field'));
            }
        }
        // nai to ye wala run ho ga code jo is ka defaul hai or sarey record show kerwaye ga
        else {
            $finder->order('auction_id', 'DESC');
        }

        // return [
        //     'categories' => $categories,
        //     'categoryTree' => $categoryTree,
        // ];

        $viewParams = [
            'categories' => $categories,
            'categoryTree' => $categoryTree,
            // 'listings' => $biddingFinder,
            'listings' => $finder->fetch(),
            'conditions' => $this->filterSearchConditions(),
        ];

        return $this->view('FS\AuctionPlugin:Overview', 'fs_auctionArchive', $viewParams);
        // return $this->view('FS\AuctionPlugin:Overview', 'addEdit_Auction', $viewParams);
    }

    public function actionViewAuction(ParameterBag $params)
    {
        ///* @var \FS\AuctionPlugin\Entity\Bidding $data /
        //$auction = $this->assertDataExists($params->auction_id);
        $auction = $this->Finder('FS\AuctionPlugin:Bidding')->whereId($params->auction_id)->fetchOne();
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

        // var_dump($conditions);
        // exit;

        $finder = $this->finder('FS\AuctionPlugin:Bidding');

        if ($conditions['fs_auction_username'] != '') {

            $User = $this->finder('XF:User')->where('username', $conditions['fs_auction_username'])->fetchOne();
            if ($User) {
                $finder->where('user_id', $User['user_id']);
            }
        }

        if ($conditions['fs_auction_status'] != 'all') {
            $finder->where('bidding_status', $conditions['fs_auction_status']);
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

    public function actionView(ParameterBag $params)
    {
        $listing = $this->assertViewableListing($params->listing_id, $this->getListingExtraWiths());

        $snippet = $this->app->stringFormatter()->wholeWordTrim(
            $listing->content,
            250
        );

        if ($this->options()->z61ClassifiedsAuthorOtherListingsCount && $listing->User) {
            $authorOthers = $this->getListingRepo()
                ->findOtherListingsByAuthor($listing)
                ->fetch($this->options()->z61ClassifiedsAuthorOtherListingsCount);
            $authorOthers = $authorOthers->filterViewable();
        } else {
            $authorOthers = $this->em()->getEmptyCollection();
        }

        $listingRepo = $this->getListingRepo();

        $listingRepo->markListingReadByVisitor($listing);
        $listingRepo->logListingView($listing);

        $viewParams = [
            'listing' => $listing,
            'descSnippet' => $snippet,
            'category' => $listing->Category,
            'authorOthers' => $authorOthers,
            'iconError' => $this->filter('icon_error', 'bool')
        ];
        return $this->view('Z61\Classifieds:Listing\View', 'z61_classifieds_listing_view', $viewParams);
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
        return $this->rerouteController('FS\AuctionPlugin:Bidding', 'addListingChooser', $params);
    }

    public function actionRefineSearch(ParameterBag $params)
    {
        $categories = $this->finder('FS\AuctionPlugin:Category')->fetch();

        $viewParams = [
            'conditions' => $this->filterSearchConditions(),
            'categories' => $categories,
        ];

        return $this->view('FS\AuctionPlugin:Auction\RefineSearch', 'fs_auction_search_filter', $viewParams);
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
