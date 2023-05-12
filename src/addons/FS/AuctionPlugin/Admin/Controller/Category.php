<?php

namespace FS\AuctionPlugin\Admin\Controller;

use XF\Admin\Controller\AbstractController;
use XF\Mvc\ParameterBag;
use XF\Option\Forum;

class Category extends AbstractController
{
    protected function preDispatchController($action, ParameterBag $params)
    {
        $this->assertAdminPermission('fs_auction');
    }

    /**
     * @return \FS\AuctionPlugin\ControllerPlugin\CategoryTree
     */
    protected function getCategoryTreePlugin()
    {
        return $this->plugin('FS\AuctionPlugin:CategoryTree');
    }

    public function actionIndex()
    {
        return $this->getCategoryTreePlugin()->actionList([
            'permissionContentType' => 'fs_auction'
        ]);
    }

    public function actionEdit(ParameterBag $params)
    {
        $category = $this->assertCategoryExists($params->category_id);
        return $this->categoryAddEdit($category);
    }

    public function actionAdd()
    {
        $parentCategoryId = $this->filter('parent_category_id', 'uint');

        /** @var \FS\AuctionPlugin\Entity\Category $category */
        $category = $this->em()->create('FS\AuctionPlugin:Category');
        $category->parent_category_id = $parentCategoryId;

        return $this->categoryAddEdit($category);
    }

    protected function categoryAddEdit(\FS\AuctionPlugin\Entity\Category $category)
    {
        $categoryRepo = $this->getCategoryRepo();

        $categoryTree = $categoryRepo->createCategoryTree();

        $viewParams = [
            'category' => $category,
            'categoryTree' => $categoryTree,
        ];
        return $this->view('FS\AuctionPlugin:Category\Edit', 'fs_auction_categories_edit', $viewParams);
    }

    protected function categorySaveProcess(\FS\AuctionPlugin\Entity\Category $category)
    {
        $form = $this->formAction();

        $input = $this->filter([
            'title' => 'str',
            'description' => 'str',
            'parent_category_id' => 'uint',
            'display_order' => 'uint',
            // 'node_id' => 'uint',
            // 'moderate_listings' => 'bool',
            // 'thread_prefix_id' => 'uint',
            // 'allow_paid' => 'bool',
            // 'paid_feature_enable' => 'bool',
            // 'paid_feature_days' => 'uint',
            // 'payment_profile_ids' => 'array-uint',
            // 'listing_type_ids' => 'array-uint',
            // 'condition_ids' => 'array-uint',
            // 'package_ids' => 'array-uint',
            // 'contact_conversation' => 'bool',
            // 'contact_email' => 'bool',
            // 'contact_custom' => 'bool',
            // 'price' => 'str',
            // 'currency' => 'str',
            // 'require_listing_image' => 'bool',
            'layout_type' => 'str',
            // 'location_enable' => 'bool',
            // 'require_sold_user' => 'bool',
            // 'replace_forum_action_button' => 'bool',
            // 'phrase_listing_type' => 'str',
            // 'phrase_listing_condition' => 'str',
            // 'phrase_listing_price' => 'str',
        ]);

        // $category->listing_template = $this->plugin('XF:Editor')->fromInput('listing_template');

        $form->basicEntitySave($category, $input);

        // $prefixIds = $this->filter('available_prefixes', 'array-uint');
        // $form->complete(function() use ($category, $prefixIds)
        // {
        //     /** @var \Z61\Classifieds\Repository\CategoryPrefix $repo */
        //     $repo = $this->repository('Z61\Classifieds:CategoryPrefix');
        //     $repo->updateContentAssociations($category->category_id, $prefixIds);
        // });

        // $fieldIds = $this->filter('available_fields', 'array-str');
        // $form->complete(function() use ($category, $fieldIds)
        // {
        //     /** @var \Z61\Classifieds\Repository\CategoryField $repo */
        //     $repo = $this->repository('Z61\Classifieds:CategoryField');
        //     $repo->updateContentAssociations($category->category_id, $fieldIds);
        // });

        return $form;
    }

    public function actionSave(ParameterBag $params)
    {
        if ($params->category_id) {
            $category = $this->assertCategoryExists($params->category_id);
        } else {
            $category = $this->em()->create('FS\AuctionPlugin:Category');
        }

        $this->categorySaveProcess($category)->run();

        return $this->redirect($this->buildLink('auction/categories') . $this->buildLinkHash($category->category_id));
    }

    public function actionDelete(ParameterBag $params)
    {
        return $this->getCategoryTreePlugin()->actionDelete($params);
    }

    public function actionSort()
    {
        return $this->getCategoryTreePlugin()->actionSort();
    }

    /**
     * @param string $id
     * @param array|string|null $with
     * @param null|string $phraseKey
     *
     * @return \FS\AuctionPlugin\Entity\Category
     */
    protected function assertCategoryExists($id, $with = null, $phraseKey = null)
    {
        return $this->assertRecordExists('FS\AuctionPlugin:Category', $id, $with, $phraseKey);
    }

    /**
     * @return \FS\AuctionPlugin\Repository\Category
     */
    protected function getCategoryRepo()
    {
        return $this->repository('FS\AuctionPlugin:Category');
    }
}
