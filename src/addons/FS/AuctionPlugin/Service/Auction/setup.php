<?php

namespace FS\AuctionPlugin;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;
use XF\Mvc\FormAction;
use XF\Db\Schema\Alter;
use XF\Db\Schema\Create;

use FS\AuctionPlugin\Install\Data\MySql;

class Setup extends AbstractSetup
{
    use StepRunnerInstallTrait;
    use StepRunnerUpgradeTrait;
    use StepRunnerUninstallTrait;

    public function installstep1()
    {
        $sm = $this->schemaManager();

        // foreach ($this->getTables() as $tableName => $callback) {
        //             $sm->createTable($tableName, $callback);

        // }
        // $this->schemaManager()->createTable('fs_auction_ship_terms', function (Create $table) {
        // 	$table->addColumn('term_id', 'int', '255')->autoIncrement();
        // 	$table->addColumn('shipping_term', 'mediumtext')->nullable();

        // 	$table->addPrimaryKey('term_id');
        // });

        // $this->schemaManager()->createTable('fs_auction_ship_via', function (Create $table) {
        // 	$table->addColumn('via_id', 'int', '255')->autoIncrement();
        // 	$table->addColumn('ship_via', 'mediumtext')->nullable();

        // 	$table->addPrimaryKey('via_id');
        // });

        // $this->alterTable('xf_user', function (\XF\Db\Schema\Alter $table) {

        // 	$table->addColumn('layout_type', 'int')->setDefault(0);
        // });

        $this->alterTable('xf_thread', function (\XF\Db\Schema\Alter $table) {

            $table->addColumn('auction_end_date', 'int')->setDefault(0);
        });

        //	$this->insertDefaultData();
    }

    public function uninstallStep1()
    {

        $node = \xf::app()->em->create('XF:Node');
        $node->title = "Ftesteasdr";
        $node->node_name = "fxcvshome";
        $node->node_type_id = "Forum";
        $node->display_order = 1;
        $node->display_in_list = 1;
        $node->save();



        $userGroup = $this->assertRecordExists('XF:UserGroup', 2);
        $permissions = ;

    

        $permissionUpdater = \xf::app()->service('XF:UpdatePermissions');
        $permissionUpdater->setContent("node", $node->{$this->primaryKey})->setUserGroup($userGroup);
        $permissionUpdater->updatePermissions($permissions);

        exit;
        // echo "<pre>";
        // var_dump($node);
        // exit;

        $this->insertDefaultData();

        exit;
        $sm = $this->schemaManager();

        foreach (array_keys($this->getTables()) as $tableName) {
            $sm->dropTable($tableName);
        }

        $sm->dropTable('fs_auction_ship_terms');
        $sm->dropTable('fs_auction_ship_via');

        $this->schemaManager()->alterTable('xf_user', function (\XF\Db\Schema\Alter $table) {
            $table->dropColumns(['layout_type']);
        });

        $this->schemaManager()->alterTable('xf_thread', function (\XF\Db\Schema\Alter $table) {
            $table->dropColumns(['auction_end_date']);
        });

        $db = \XF::db();
        $db->delete('xf_attachment', "content_type = 'fs_auction'");
    }

    public function insertDefaultData()
    {
        // if (!$this->addOn->isInstalled()) {
        $db = $this->app->db();
        $data = $this->getData();
        // foreach ($data as $dataQuery) {
        // 	$db->query($dataQuery);
        // }

        return 3;
        // return count($data);
        // }
    }

    protected function getTables()
    {
        $data = new MySql();
        return $data->getTables();
    }

    protected function getData()
    {

        $node = \xf::app()->em()->create('XF:Node');
        $node->node_type_id = "Forum";
        $this->createAcutionNode($node)->run();

        // custom fields

        // $threadCustomFields = [
        //     'auction_Ends_At' => [
        //         'title' => \XF::phrase('auction_time_zone'),
        //         'description' => \XF::phrase('auction_timeZone_explain'),
        //         'display_order' => '10',
        //         'field_type' => 'select',
        //         'required' => 'true',
        //         'field_id' => 'timezone',
        //         'match_type' => 'none',
        //         'fieldChoices' => [
        //             '0' => 'value1',
        //             '1' => 'value2',
        //             '2' => '',
        //         ],
        //         'fieldChoicesText' => [
        //             '0' => 'option1',
        //             '1' => 'option2',
        //             '2' => '',
        //         ],
        //         'match_params' => [],
        //     ],

        //     'starting_bid' => [
        //         'title' => \XF::phrase('starting_bid'),
        //         'description' => \XF::phrase('auction_bid_explain'),
        //         'display_order' => '20',
        //         'field_type' => 'textbox',
        //         'required' => 'false',
        //         'field_id' => 'starting_bid',
        //         'match_type' => 'number',
        //         'fieldChoices' => [],
        //         'fieldChoicesText' => [],
        //         'match_params' => [
        //             'number_min' => '1',
        //             'number_max' => '',
        //             'number_integer' => '1',
        //         ],
        //     ],

        //     'minimum_bid_increament' => [
        //         'title' => \XF::phrase('bid_increments'),
        //         'description' => '',
        //         'display_order' => '30',
        //         'field_type' => 'select',
        //         'required' => 'true',
        //         'field_id' => 'bid_increament',
        //         'match_type' => 'none',
        //         'fieldChoices' => [
        //             '0' => '0',
        //             '1' => '1',
        //             '2' => '',
        //         ],
        //         'fieldChoicesText' => [
        //             '0' => '5',
        //             '1' => '10',
        //             '2' => '',
        //         ],
        //         'match_params' => [],
        //     ],

        //     'payment_methods' => [
        //         'title' => \XF::phrase('payment_methods'),
        //         'description' => \XF::phrase('auction_payment_explain'),
        //         'display_order' => '40',
        //         'field_type' => 'checkbox',
        //         'required' => 'true',
        //         'field_id' => 'payment_methods',
        //         'match_type' => 'none',
        //         'fieldChoices' => [
        //             '0' => '0',
        //             '1' => '1',
        //             '2' => '',
        //         ],
        //         'fieldChoicesText' => [
        //             '0' => 'First Method',
        //             '1' => 'Second Method',
        //             '2' => '',
        //         ],
        //         'match_params' => [],
        //     ],

        //     'shipping_term' => [
        //         'title' => \XF::phrase('shippingTerms'),
        //         'description' => \XF::phrase('auction_shippingTerms_explain'),
        //         'display_order' => '50',
        //         'field_type' => 'select',
        //         'required' => 'true',
        //         'field_id' => 'shipping_term',
        //         'match_type' => 'none',
        //         'fieldChoices' => [
        //             '0' => '0',
        //             '1' => '1',
        //             '2' => '',
        //         ],
        //         'fieldChoicesText' => [
        //             '0' => 'Term 1',
        //             '1' => 'Term 2',
        //             '2' => '',
        //         ],
        //         'match_params' => [],
        //     ],

        //     'ships_via' => [
        //         'title' => \XF::phrase('shippingVia'),
        //         'description' => \XF::phrase('auction_shippingVia_explain'),
        //         'display_order' => '60',
        //         'field_type' => 'select',
        //         'required' => 'true',
        //         'field_id' => 'ships_via',
        //         'match_type' => 'none',
        //         'fieldChoices' => [
        //             '0' => '0',
        //             '1' => '1',
        //             '2' => '',
        //         ],
        //         'fieldChoicesText' => [
        //             '0' => 'ships 1',
        //             '1' => 'ships 2',
        //             '2' => '',
        //         ],
        //         'match_params' => [],
        //     ],

        //     'auction_guidelines' => [
        //         'title' => \XF::phrase('guidlines'),
        //         'description' => \XF::phrase('auction_guidlines_explain'),
        //         'display_order' => '70',
        //         'field_type' => 'checkbox',
        //         'required' => 'true',
        //         'field_id' => 'auction_guidelines',
        //         'match_type' => 'none',
        //         'fieldChoices' => [
        //             '0' => '0',
        //             '1' => '',
        //         ],
        //         'fieldChoicesText' => [
        //             '0' => \XF::phrase('guidlines_statement'),
        //             '1' => '',
        //         ],
        //         'match_params' => [],
        //     ],

        //     'bumping_rules' => [
        //         'title' => \XF::phrase('bumpingRule'),
        //         'description' => \XF::phrase('auction_bumpingRule_explain'),
        //         'display_order' => '80',
        //         'field_type' => 'checkbox',
        //         'required' => 'true',
        //         'field_id' => 'bumping_rules',
        //         'match_type' => 'none',
        //         'fieldChoices' => [
        //             '0' => '0',
        //             '1' => '',
        //         ],
        //         'fieldChoicesText' => [
        //             '0' => \XF::phrase('bumpingRule_statement'),
        //             '1' => '',
        //         ],
        //         'match_params' => [],
        //     ],
        // ];

        foreach ($this->customFieldAuction() as $customField) {
            $this->fieldSaveProcess(\xf::app()->em()->create('XF:ThreadField'), $customField)->run();
        }

        // $this->fieldSaveProcess($field)->run();

        // return $this->redirect($this->buildLink($this->getLinkPrefix()) . $this->buildLinkHash($field->field_id));

        // echo '<pre>';
        // var_dump("asdf", $node->save());
        // exit;

        // $node->save();

        // $data = new MySql();
        // return $data->getData();
    }

    
    protected function createAcutionNode(\XF\Entity\Node $node)
    {
        $form = \xf::app()->formAction();

        $input = [
            'node' => [
                'title' => 'AcutionTest',
                'node_name' => '',
                'description' => \XF::phrase(''),
                'parent_node_id' => '',
                'display_order' => '',
                'display_in_list' => true,
                'style_id' => '',
                'navigation_id' => ''
            ]
        ];



        $data = $node->getDataRelationOrDefault(false);
        $node->addCascadedSave($data);

        $form->basicEntitySave($node, $input['node']);
        $this->saveTypeData($form, $node, $data);

        return $form;
    }

    protected function getForumTypeHandlerForAddEdit(\XF\Entity\Node $node)
    {
        /** @var \XF\Entity\Forum $forum */
        $forum = $node->getDataRelationOrDefault(false);

        if (!$node->exists()) {

            return $this->app->forumType("discussion", false);
        } else {
            return $forum->TypeHandler;
        }
    }

    protected function saveTypeData(FormAction $form, \XF\Entity\Node $node, \XF\Entity\AbstractNode $data)
    {
        $forumType = $this->getForumTypeHandlerForAddEdit($node);
        if (!$forumType) {
            $form->logError(\XF::phrase('forum_type_handler_not_found'), 'forum_type_id');
            return;
        }

        $forumInput = [
            'allow_posting' => 'true',
            'moderate_threads' => 'false',
            'moderate_replies' => 'false',
            'count_messages' => 'true',
            'find_new' => 'true',
            'allowed_watch_notifications' => 'all',
            'default_sort_order' => 'last_post_date',
            'default_sort_direction' => 'desc',
            'list_date_limit_days' => 0,
            'default_prefix_id' => 0,
            'require_prefix' => false,
            'min_tags' => 0,
            'allow_index' => 'allow'
        ];



        $forumInput['index_criteria'] = $this->filterIndexCriteria();

        /** @var \XF\Entity\Forum $data */
        $data->bulkSet($forumInput);
        $data->forum_type_id = $forumType->getTypeId();

        $typeConfig = $forumType->setupTypeConfigSave($form, $node, $data, \xf::app()->request);
        if ($typeConfig instanceof \XF\Mvc\Entity\ArrayValidator) {
            if ($typeConfig->hasErrors()) {
                $form->logErrors($typeConfig->getErrors());
            }
            $typeConfig = $typeConfig->getValuesForced();
        }

        $data->type_config = $typeConfig;



        // if (!in_array($data->default_prefix_id, $prefixIds)) {
        // 	$data->default_prefix_id = 0;
        // }
    }

    protected function filterIndexCriteria()
    {
        $criteria = [];

        $input =

            [
                'max_days_post' => [
                    'enabled' => false,
                    'value' => 0
                ],
                'max_days_last_post' => [
                    'enabled' => false,
                    'value' => 0
                ],
                'min_replies' => [
                    'enabled' => false,
                    'value' => 0
                ],
                'min_reaction_score' => [
                    'enabled' => false,
                    'value' => 0
                ]
            ];



        foreach ($input as $rule => $criterion) {
            if (!$criterion['enabled']) {
                continue;
            }

            $criteria[$rule] = $criterion['value'];
        }

        return $criteria;
    }

  
}
