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
    // protected function preDispatchController($action, ParameterBag $params)
    // {
    //     /** @var \Z61\Classifieds\XF\Entity\User $visitor */
    //     $visitor = \XF::visitor();

    //     if (!$visitor->canViewClassifieds($error)) {
    //         throw $this->exception($this->noPermission($error));
    //     }
    // }

    public function actionIndex(ParameterBag $params)
    {
        if ($params->listing_id) {
            return $this->rerouteController(__CLASS__, 'view', $params);
        }

        $finder = $this->finder('FS\AuctionPlugin:Category')->order('category_id', 'DESC')->fetch();
        $biddingFinder = $this->finder('FS\AuctionPlugin:Bidding')->order('bidding_id', 'DESC')->fetch();

        $viewParams = [
            'categories' => $finder,
            'data' => $biddingFinder
        ];

        return $this->view('FS\AuctionPlugin:Overview', 'fs_auction_categories_overview', $viewParams);
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
        // $nodeId = $this->filter('node_id', 'uint');

        $this->assertCanonicalUrl($this->buildLink('auction/add-listing-chooser'));

        // $categoryRepo = $this->getCategoryRepo();
        // $categories = $categoryRepo->getViewableCategoriesWhere(null, null, $nodeId ? ['node_id', $nodeId] : null);

        // $canCreateListing = false;

        $finder = $this->finder('FS\AuctionPlugin:Category')->order('category_id', 'DESC')->fetch();


        if ($finder->count() < 0) {
            //     foreach ($categories as $category) {
            //         if ($category->canAddListing()) {
            //             $canCreateListing = true;
            //             break;
            //         }
            //     }
            // } else {
            return $this->error(\XF::phrase('fs_auction_no_categories_exist_at_this_time'));
        }

        // if (!$canCreateListing) {
        //     return $this->noPermission();
        // }

        // $categoryTree = $categoryRepo->createCategoryTree($categories);
        // $categoryTree = $categoryTree->filter(null, function ($id, \FS\AuctionPlugin\Entity\Category $category, $depth, $children, \XF\Tree $tree) {
        //     return ($children || $category->canAddListing());
        // });

        // $categoryListExtras = $categoryRepo->getCategoryListExtras($categoryTree);

        $finder = $this->finder('FS\AuctionPlugin:Category')->order('category_id', 'DESC')->fetch();


        $viewParams = [
            'categories' => $finder
        ];

        // $viewParams = [
        //     'categoryTree' => $categoryTree,
        //     'categoryExtras' => $categoryListExtras
        // ];
        return $this->view('FS\AuctionPlugin:Auction\AddListingChooser', 'fs_auction_categories_add_listing_chooser', $viewParams);
    }

    public function actionAdd(ParameterBag $params)
    {
        return $this->rerouteController('FS\AuctionPlugin:Bidding', 'addListingChooser', $params);
    }

    protected function getCategoryRepo()
    {
        return $this->repository('FS\AuctionPlugin:Category');
    }
}
