<?php

namespace FS\Molly\Pub\Controller;

use XF\Mvc\FormAction;
use XF\Mvc\ParameterBag;

use XF\Pub\Controller\AbstractController;

class Molly extends AbstractController
{

    public function actionIndex(ParameterBag $params)
    {
        // $finder = $this->finder('FS\AuctionPlugin:AuctionListing');

        $finder = $this->finder('XF:Node')->where("parent_node_id", $this->app()->options()->fs_molly_applicable_forum)->fetch();


        $viewParams = [
            "subForums" => $finder ?: ''
        ];

        return $this->view('FS\Molly:Molly\Index', 'fs_molly_index', $viewParams);
    }

    protected function nodeAddEdit(\XF\Entity\Node $node)
    {
        $nodeRepo = $this->repository('XF:Node');
        $nodeTree = $nodeRepo->createNodeTree($nodeRepo->getFullNodeList());

        /** @var \XF\Repository\Style $styleRepo */
        $styleRepo = $this->repository('XF:Style');
        $styleTree = $styleRepo->getStyleTree(false);

        /** @var \XF\Repository\Navigation $navRepo */
        $navRepo = $this->repository('XF:Navigation');
        $navChoices = $navRepo->getTopLevelEntries();

        $viewParams = [
            'node' => $node,
            'forum' => $node->getDataRelationOrDefault(),
            'nodeTree' => $nodeTree,
            'styleTree' => $styleTree,
            'navChoices' => $navChoices,
        ];

        // var_dump($this->getViewClassPrefix() . '\Edit', $this->getTemplatePrefix() . '_edit');
        // exit;
        return $this->view('FS\Molly:Molly\Index', 'fs_molly_sub_forum_add_edit', $viewParams);
    }

    public function actionAdd()
    {
        /** @var \XF\Entity\Node $node */
        $node = $this->em()->create('XF:Node');
        $node->node_type_id = "Forum";
        $node->parent_node_id = intval($this->app()->options()->fs_molly_applicable_forum);
        return $this->nodeAddEdit($node);
    }

    public function actionSave(ParameterBag $params)
    {
        // var_dump("hello");
        // exit;

        if ($params['node_id']) {
            $node = $this->assertNodeExists($params['node_id']);
        } else {
            /** @var \XF\Entity\Node $node */
            $node = $this->em()->create('XF:Node');
            $node->node_type_id = "Forum";
        }

        $this->nodeSaveProcess($node)->run();

        $this->addRouteFilter($node);

        // return $this->redirect($this->buildLink('forums/') . $node->node_id);
        return $this->redirect($this->buildLink('molly'));
    }

    protected function nodeSaveProcess(\XF\Entity\Node $node)
    {
        // var_dump('lksdjfdsf');exit;

        $form = $this->formAction();

        $input = $this->filter([
            'node' => [
                'title' => 'str',
                'node_name' => 'str',
                'description' => 'str',
                'parent_node_id' => 'uint',
                'display_order' => 'uint',
                'display_in_list' => 'bool',
                'style_id' => 'uint',
                'navigation_id' => 'str'
            ]
        ]);

        if (!$this->filter('style_override', 'bool')) {
            $input['node']['style_id'] = 0;
        }

        $data = $node->getDataRelationOrDefault(false);
        $node->addCascadedSave($data);

        $form->basicEntitySave($node, $input['node']);
        $this->saveTypeData($form, $node, $data);

        return $form;
    }

    protected function saveTypeData(FormAction $form, \XF\Entity\Node $node, \XF\Entity\AbstractNode $data)
    {
        $forumType = $this->getForumTypeHandlerForAddEdit($node);
        if (!$forumType) {
            $form->logError(\XF::phrase('forum_type_handler_not_found'), 'forum_type_id');
            return;
        }

        $forumInput = $this->filter([
            'allow_posting' => 'bool',
            'moderate_threads' => 'bool',
            'moderate_replies' => 'bool',
            'count_messages' => 'bool',
            'find_new' => 'bool',
            'allowed_watch_notifications' => 'str',
            // 'default_sort_order' => 'str',
            'default_sort_direction' => 'str',
            'list_date_limit_days' => 'uint',
            'default_prefix_id' => 'uint',
            'require_prefix' => 'bool',
            'min_tags' => 'uint',
            'allow_index' => 'str'
        ]);

        // last_post_date


        $forumInput += ['default_sort_order' => 'last_post_date',];

        $forumInput['index_criteria'] = $this->filterIndexCriteria();

        /** @var \XF\Entity\Forum $data */
        $data->bulkSet($forumInput);
        $data->forum_type_id = $forumType->getTypeId();

        $typeConfig = $forumType->setupTypeConfigSave($form, $node, $data, $this->request);
        if ($typeConfig instanceof \XF\Mvc\Entity\ArrayValidator) {
            if ($typeConfig->hasErrors()) {
                $form->logErrors($typeConfig->getErrors());
            }
            $typeConfig = $typeConfig->getValuesForced();
        }

        $data->type_config = $typeConfig;

        $prefixIds = $this->filter('available_prefixes', 'array-uint');
        $form->complete(function () use ($data, $prefixIds) {
            /** @var \XF\Repository\ForumPrefix $repo */
            $repo = $this->repository('XF:ForumPrefix');
            $repo->updateContentAssociations($data->node_id, $prefixIds);
        });

        if (!in_array($data->default_prefix_id, $prefixIds)) {
            $data->default_prefix_id = 0;
        }

        $fieldIds = $this->filter('available_fields', 'array-str');
        $form->complete(function () use ($data, $fieldIds) {
            /** @var \XF\Repository\ForumField $repo */
            $repo = $this->repository('XF:ForumField');
            $repo->updateContentAssociations($data->node_id, $fieldIds);
        });

        $promptIds = $this->filter('available_prompts', 'array-uint');
        $form->complete(function () use ($data, $promptIds) {
            /** @var \XF\Repository\ForumPrompt $repo */
            $repo = $this->repository('XF:ForumPrompt');
            $repo->updateContentAssociations($data->node_id, $promptIds);
        });
    }

    /**
     * @param \XF\Entity\Node $node
     *
     * @return \XF\ForumType\AbstractHandler|null
     */
    protected function getForumTypeHandlerForAddEdit(\XF\Entity\Node $node)
    {
        /** @var \XF\Entity\Forum $forum */
        $forum = $node->getDataRelationOrDefault(false);

        if (!$node->exists()) {
            $forumTypeId = "discussion";
            return $this->app->forumType($forumTypeId, false);
        } else {
            return $forum->TypeHandler;
        }
    }

    /**
     * @return array
     */
    protected function filterIndexCriteria()
    {
        $criteria = [];

        $input = $this->filterArray(
            $this->filter('index_criteria', 'array'),
            [
                'max_days_post' => [
                    'enabled' => 'bool',
                    'value' => 'posint'
                ],
                'max_days_last_post' => [
                    'enabled' => 'bool',
                    'value' => 'posint'
                ],
                'min_replies' => [
                    'enabled' => 'bool',
                    'value' => 'posint'
                ],
                'min_reaction_score' => [
                    'enabled' => 'bool',
                    'value' => 'int'
                ]
            ]
        );

        foreach ($input as $rule => $criterion) {
            if (!$criterion['enabled']) {
                continue;
            }

            $criteria[$rule] = $criterion['value'];
        }

        return $criteria;
    }

    protected function addRouteFilter($node)
    {
        $routeFilter = $this->em()->create('XF:RouteFilter');

        $this->routeFilterSaveProcess($routeFilter, $node)->run();
    }


    protected function routeFilterSaveProcess(\XF\Entity\RouteFilter $routeFilter, $node)
    {
        $form = \xf::app()->formAction();

        $input = [
            'find_route' => 'forums/' . $node->title . '.' . $node->node_id . '/',
            'replace_route' => $this->filter('replace_route', 'str'),
            'url_to_route_only' => '',
            'enabled' => 'true'
        ];
        $form->basicEntitySave($routeFilter, $input);

        return $form;
    }

    public function actionAddModerator(ParameterBag $params)
    {

        exit;
    }

    /**
     * @param string $id
     * @param array|string|null $with
     * @param null|string $phraseKey
     *
     * @return \XF\Entity\Node
     */
    protected function assertNodeExists($id, $with = null, $phraseKey = null)
    {
        $node = $this->assertRecordExists('XF:Node', $id, $with, $phraseKey);
        if ($node->node_type_id != "Forum") {
            throw $this->exception($this->error(\XF::phrase('requested_node_not_found'), 404));
        }
        return $node;
    }
}
