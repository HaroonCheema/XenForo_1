<?php

namespace FS\AuctionPlugin\Pub\Controller;

use XF\Mvc\ParameterBag;


use XF\Pub\Controller\AbstractController;

class Category extends AbstractController
{
    public function actionAdd(ParameterBag $params)
    {
        $category = $this->assertViewableCategory($params->category_id);

        if (!$category->canAddListing($error)) {
            return $this->noPermission($error);
        }

        if ($this->isPost()) {
            $creator = $this->setupListingCreate($category);
            $creator->checkForSpam();

            if (!$creator->validate($errors)) {
                return $this->error($errors);
            }

            /** @var \FS\AuctionPlugin\Entity\Listing $listing */
            $listing = $creator->save();
            $this->finalizeListingCreate($creator);

            if ($listing->Package->cost_amount > 0.00) {
                $this->request->set('listing_id', $listing->listing_id);

                return $this->rerouteController('FS\AuctionPlugin:Listing', 'pay', [
                    'listing_id' => $listing->listing_id
                ]);
            }

            if (!$listing->canView()) {
                return $this->redirect($this->buildLink('auction/categories', $category, [
                    'pending_approval' => 1,
                ]));
            } else {
                return $this->redirect($this->buildLink('auction', $listing));
            }
        } else {
            /** @var \XF\Repository\Attachment $attachmentRepo */
            $attachmentRepo = $this->repository('XF:Attachment');

            $draft = $category->draft_listing;

            // if ($category->canUploadAndManageAttachments()) {
            //     $attachmentData = $attachmentRepo->getEditorData('classifieds_listing', $category, $draft->attachment_hash);
            // } else {
                $attachmentData = null;
            // }

            $listing = $category->getNewListing();

            $listing->title = $draft->title ?: '';

            $viewParams = [
                'category' => $category,
                'listing' => $listing,
                'attachmentData' => $attachmentData,
                // 'prefixes' => $category->getUsablePrefixes(),
                // 'listingTypes' => $category->listing_types,
                // 'conditions' => $category->conditions,
                // 'packages' => $category->packages
            ];
            return $this->view(
                'FS\AuctionPlugin:Category\Add',
                'fs_auction_category_add_listing',
                $viewParams
            );
        }
    }

    /**
     * @param $categoryId
     * @param array $extraWith
     * @return \Z61\Classifieds\Entity\Category
     * @throws \XF\Mvc\Reply\Exception
     */
    protected function assertViewableCategory($categoryId = null, array $extraWith = [])
    {
        $finder = $this->em()->getFinder('FS\AuctionPlugin:Category');
        $finder->where('category_id', $categoryId);

        /** @var \FS\AuctionPlugin\Entity\Category $category */
        $category = $finder->fetchOne();

        if (!$category) {
            throw $this->exception($this->notFound(\XF::phrase('fs_auction_requested_category_not_found')));
        }

        return $category;
    }
}
