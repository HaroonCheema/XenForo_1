<?php

namespace FS\Molly\Pub\Controller;

use XF\Mvc\FormAction;
use XF\Mvc\ParameterBag;

use XF\Pub\Controller\AbstractController;
use FS\Molly\Service\Molly\AbstractFormUpload;
use XF\Template\Templater;
use InvalidArgumentException;

class Molly extends AbstractController
{

    public function actionIndex(ParameterBag $params)
    {
        // $finder = $this->finder('FS\AuctionPlugin:AuctionListing');

        if ($params['node_id'] > 0) {
            return $this->actionSingleView($params);
        }

        $finder = $this->finder('XF:Node')->where("parent_node_id", $this->app()->options()->fs_molly_applicable_forum)->fetch();


        $viewParams = [
            "subForums" => $finder ?: ''
        ];

        return $this->view('FS\Molly:Molly\Index', 'fs_molly_index', $viewParams);
    }

    public function actionSingleView($params)
    {

        // \XF::em()->find('XF:Node', $params->node_id);

        $forum = $this->assertViewableForum($params->node_id ?: $params->node_name, $this->getForumViewExtraWith());

        $threadRepo = $this->getThreadRepo();

        $threadList = $threadRepo->findThreadsForForumView(
            $forum,
            [
                'allowOwnPending' => $this->hasContentPendingApproval()
            ]
        );

        $threadList->where('sticky', 0);

        /** @var \XF\Entity\Thread[]|\XF\Mvc\Entity\AbstractCollection $threads */
        $threads = $threadList->fetch();

        $subCommunity = \XF::em()->find('XF:Node', $params->node_id);

        $viewParams = [
            'forum' => $forum,
            'threads' => $threads,
            "subForums" => $subCommunity ?: '',
            // "subForums" => \XF::em()->find('XF:Node', $params->node_id) ?: ''
        ];

        return $this->view('FS\Molly:Molly\Index', 'fs_molly_view', $viewParams);
    }

    protected function getForumViewExtraWith()
    {
        $extraWith = [];
        $userId = \XF::visitor()->user_id;
        if ($userId) {
            $extraWith[] = 'Watch|' . $userId;
        }

        return $extraWith;
    }

    /**
     * @return \XF\Repository\Thread
     */
    protected function getThreadRepo()
    {
        return $this->repository('XF:Thread');
    }

    /**
     * @param string|int $nodeIdOrName
     * @param array $extraWith
     *
     * @return \XF\Entity\Forum
     *
     * @throws \XF\Mvc\Reply\Exception
     */
    protected function assertViewableForum($nodeIdOrName, array $extraWith = [])
    {
        if ($nodeIdOrName === null) {
            throw $this->exception($this->notFound(\XF::phrase('requested_forum_not_found')));
        }

        $visitor = \XF::visitor();
        $extraWith[] = 'Node.Permissions|' . $visitor->permission_combination_id;
        if ($visitor->user_id) {
            $extraWith[] = 'Read|' . $visitor->user_id;
        }

        $finder = $this->em()->getFinder('XF:Forum');
        $finder->with('Node', true)->with($extraWith);
        if (is_int($nodeIdOrName) || $nodeIdOrName === strval(intval($nodeIdOrName))) {
            $finder->where('node_id', $nodeIdOrName);
        } else {
            $finder->where(['Node.node_name' => $nodeIdOrName, 'Node.node_type_id' => 'Forum']);
        }

        /** @var \XF\Entity\Forum $forum */
        $forum = $finder->fetchOne();
        if (!$forum) {
            throw $this->exception($this->notFound(\XF::phrase('requested_forum_not_found')));
        }
        if (!$forum->canView($error)) {
            throw $this->exception($this->noPermission($error));
        }

        $this->plugin('XF:Node')->applyNodeContext($forum->Node);

        return $forum;
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
        $input = $this->filter([
            'username' => 'str',
            'type' => 'str',
            'type_id' => 'array-uint'
        ]);

        if ($input['username'] === '' || $input['type'] === '') {
            $viewParams = [
                'typeHandlers' => $this->app->getContentTypeField('moderator_handler_class'),
                'type' => $input['type'],
                'typeId' => $input['type_id'],
                'subForum' => \XF::em()->find('XF:Node', $params->node_id)
            ];
            return $this->view('XF:Moderator\AddChoice', 'moderator_add_choice', $viewParams);
        }

        $user = $this->finder('XF:User')->where('username', $input['username'])->fetchOne();
        if (!$user) {
            return $this->error(\XF::phrase('requested_user_not_found'));
        }

        $generalModerator = $this->em()->find('XF:Moderator', $user->user_id);
        if (!$generalModerator) {
            $generalModerator = $this->em()->create('XF:Moderator');
            $generalModerator->user_id = $user->user_id;
            $generalModerator->is_super_moderator = ($input['type'] == '_super');
        }

        if ($input['type'] != '_super') {
            $handler = $this->getModRepo()->getModeratorHandler($input['type']);
            if (!$handler) {
                return $this->error(\XF::phrase('please_choose_valid_moderator_type'), 404);
            }

            $contentId = $input['type_id'][$input['type']] ?? 0;
            if (!$handler->getContentTitle($contentId)) {
                return $this->error(\XF::phrase('please_select_a_valid_type_of_moderator'), 404);
            }

            $contentModerator = $this->finder('XF:ModeratorContent')
                ->where([
                    'content_type' => $input['type'],
                    'content_id' => $contentId,
                    'user_id' => $user->user_id
                ])
                ->fetchOne();

            if (!$contentModerator) {
                $contentModerator = $this->em()->create('XF:ModeratorContent');

                $contentModerator->content_type = $input['type'];
                $contentModerator->content_id = $contentId;
                $contentModerator->user_id = $user->user_id;
            }
        } else {
            $contentModerator = null;
        }

        return $this->moderatorAddEdit($generalModerator, $contentModerator);
    }

    protected function moderatorAddEdit(
        \XF\Entity\Moderator $generalModerator,
        \XF\Entity\ModeratorContent $contentModerator = null
    ) {
        /** @var \XF\Repository\PermissionEntry $permissionEntryRepo */
        $permissionEntryRepo = $this->repository('XF:PermissionEntry');

        $modRepo = $this->getModRepo();

        $existingPermissionValues = $permissionEntryRepo->getGlobalUserPermissionEntries($generalModerator->user_id);

        if ($contentModerator) {
            $moderatorHandler = $modRepo->getModeratorHandler($contentModerator->content_type);
            if (!$moderatorHandler) {
                return $this->error(\XF::phrase('this_content_moderator_relates_to_unknown_content_type'));
            }

            $contentTitle = $moderatorHandler->getContentTitle($contentModerator->content_id);

            $contentPermissionValues = $permissionEntryRepo->getContentUserPermissionEntries(
                $contentModerator->content_type,
                $contentModerator->content_id,
                $contentModerator->user_id
            );
            $existingPermissionValues = \XF\Util\Arr::mapMerge($existingPermissionValues, $contentPermissionValues);
        } else {
            $contentTitle = '';
        }

        $user = $generalModerator->User;

        $moderatorPermissionData = $modRepo->getModeratorPermissionData(
            $contentModerator ? $contentModerator->content_type : null
        );

        $viewParams = [
            'user' => $user,
            'generalModerator' => $generalModerator,
            'contentModerator' => $contentModerator,

            'contentTitle' => $contentTitle,
            'isStaff' => $generalModerator->exists() ? $user->is_staff : true,

            'existingValues' => $existingPermissionValues,
            'allowValues' => ['allow', 'content_allow'],

            'interfaceGroups' => $moderatorPermissionData['interfaceGroups'],
            'globalPermissions' => $moderatorPermissionData['globalPermissions'],
            'contentPermissions' => $moderatorPermissionData['contentPermissions'],

            'userGroups' => $this->em()->getRepository('XF:UserGroup')->getUserGroupTitlePairs()
        ];

        return $this->view('XF:Moderator\Edit', 'moderator_edit', $viewParams);
    }

    public function actionModeratorSave(ParameterBag $params)
    {
        $this->assertPostOnly();

        $findInput = $this->filter([
            'user_id' => 'uint',
            'content_type' => 'str',
            'content_id' => 'uint'
        ]);

        $user = $this->assertRecordExists('XF:User', $findInput['user_id']);

        $generalModerator = $this->em()->find('XF:Moderator', $user->user_id);
        if (!$generalModerator) {
            $generalModerator = $this->em()->create('XF:Moderator');
            $generalModerator->user_id = $user->user_id;
        }

        $contentModerator = null;
        if ($findInput['content_type'] && $findInput['content_id']) {
            $contentModerator = $this->finder('XF:ModeratorContent')->where($findInput)->fetchOne();
            if (!$contentModerator) {
                $contentModerator = $this->em()->create('XF:ModeratorContent');
                $contentModerator->bulkSet($findInput);
            }
        }

        if (!$contentModerator) {
            $generalModerator->is_super_moderator = true;
        }

        $this->moderatorSaveProcess($generalModerator, $contentModerator)->run();

        return $this->redirect($this->buildLink('molly'));
    }

    protected function moderatorSaveProcess(
        \XF\Entity\Moderator $generalModerator,
        \XF\Entity\ModeratorContent $contentModerator = null
    ) {
        $form = $this->formAction();

        $input = $this->filter([
            'extra_user_group_ids' => 'array-uint',
            'globalPermissions' => 'array',
            'contentPermissions' => 'array',
            'is_staff' => 'bool'
        ]);

        $user = $generalModerator->User;

        $form->basicEntitySave($user, [
            'is_staff' => $input['is_staff']
        ]);

        /** @var \XF\Service\UpdatePermissions $permissionUpdater */
        $permissionUpdater = $this->service('XF:UpdatePermissions');
        $permissionUpdater->setUser($user);

        $form->basicEntitySave($generalModerator, [
            'extra_user_group_ids' => $input['extra_user_group_ids']
        ]);
        $form->apply(function () use ($permissionUpdater, $input) {
            $permissionUpdater->setGlobal();
            $permissionUpdater->updatePermissions($input['globalPermissions']);
        });

        if ($contentModerator) {
            // need to get this saved, even though it has been configured already
            $form->basicEntitySave($contentModerator, []);

            $form->complete(function () use ($permissionUpdater, $contentModerator, $input) {
                $permissionUpdater->setContent($contentModerator->content_type, $contentModerator->content_id);
                $permissionUpdater->updatePermissions($input['contentPermissions']);
            });
        }

        // TODO: the permissions are actually rebuilt twice with this method

        return $form;
    }

    public function actionAvatar(ParameterBag $params)
    {
        $subCommunity = $this->assertNodeExists($params['node_id']);

        // var_dump($subCommunity);exit;
        // if (!$subCommunity->canManageAvatar($errors)) {
        //     return $this->noPermission($errors);
        // }

        /** @var \FS\Molly\Service\Molly\Avatar $avatar */
        $avatar = $this->service('FS\Molly:Molly\Avatar', $subCommunity);

        return $this->handleAvatarOrCoverProcess($subCommunity, $avatar);
    }

    public function actionCover(ParameterBag $params)
    {
        $subCommunity = $this->assertNodeExists($params['node_id']);
        // if (!$group->canManageCover($errors)) {
        //     return $this->noPermission($errors);
        // }

        /** @var \FS\Molly\Service\Molly\Cover $cover */
        $cover = $this->service('FS\Molly:Molly\Cover', $subCommunity);
        if ($this->filter('reposition', 'bool') === true) {
            if ($this->isPost()) {
                $crop = $this->filter([
                    'crop' => [
                        'w' => 'uint',
                        'h' => 'uint',
                        'x' => 'str',
                        'y' => 'str'
                    ]
                ]);

                $cover->setCropData($crop['crop']);
                $cover->saveCropData();

                return $this->redirect($this->buildLink('molly', $subCommunity));
            }

            return $this->view('FS\Molly:Molly\CoverReposition', 'fs_molly_cover_reposition', [
                'group' => $subCommunity
            ]);
        }

        return $this->handleAvatarOrCoverProcess($subCommunity, $cover);
    }

    /**
     * @param \XF\Entity\Node $subCommunity
     * @param AbstractFormUpload $service
     * @param array $params
     * @return \XF\Mvc\Reply\AbstractReply
     */
    protected function handleAvatarOrCoverProcess(
        \XF\Entity\Node $subCommunity,
        AbstractFormUpload $service,
        array $params = []
    ) {
        if ($this->isPost()) {
            if (
                $this->filter('delete', 'bool') === true
                && $service->canDeleteExisting()
            ) {
                $service->delete();
            }

            $uploadedFile = $this->request->getFile('file');
            if ($uploadedFile) {
                $service->setUpload($uploadedFile);
                if (!$service->validate($errors)) {
                    return $this->error($errors);
                }

                $service->upload();
            }

            return $this->redirect($this->buildLink('molly', $subCommunity));
        }

        list($baseWidth, $baseHeight) = $service->getBaseDimensions();
        $params += [
            'subCommunity' => $subCommunity,
            'formAction' => $service->getFormAction(),
            'fieldLabel' => $service->getFormFieldLabel(),
            'canDelete' => $service->canDeleteExisting(),
            'baseWidth' => $baseWidth,
            'baseHeight' => $baseHeight
        ];

        return $this->view('FS\Molly:Molly\FormUpload', 'fs_molly_form_upload', $params);
    }

    /**
     * @return \XF\Repository\Moderator
     */
    protected function getModRepo()
    {
        return $this->repository('XF:Moderator');
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
