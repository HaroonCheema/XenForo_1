<?php

namespace FS\AuctionPlugin\Install\Data;

use XF\Db\Schema\Create;
use XF\Db\Schema\Alter;

class MySql
{

    public function getTables()
    {
        $tables = [];

        $tables['fs_auction_category'] = function (Create $table) {
            /** @var Create|Alter $table */
            $table->addColumn('category_id', 'int')->autoIncrement();
            $table->addColumn('title', 'varchar', 100);
            $table->addColumn('description', 'text');
            $table->addColumn('parent_category_id', 'int')->setDefault(0);
            $table->addColumn('display_order', 'int')->setDefault(0);
            $table->addColumn('lft', 'int')->setDefault(0);
            $table->addColumn('rgt', 'int')->setDefault(0);
            $table->addColumn('depth', 'smallint', 5)->setDefault(0);
            $table->addColumn('breadcrumb_data', 'blob');
            $table->addColumn('bid_count', 'int')->setDefault(0);
            $table->addColumn('layout_type', 'varchar', 20)->setDefault('list_view');
            $table->addKey(['parent_category_id', 'lft']);
            $table->addKey(['lft', 'rgt']);
            $table->addPrimaryKey('category_id');
        };

        $tables['fs_auction_listing'] = function (Create $table) {
            /** @var Create|Alter $table */
            $table->addColumn('auction_id', 'int')->autoIncrement();
            $table->addColumn('category_id', 'int')->setDefault(0);
            $table->addColumn('title', 'varchar', 100);
            $table->addColumn('content', 'mediumtext');
            $table->addColumn('user_id', 'int')->setDefault(0);
            $table->addColumn('prefix_id', 'int')->setDefault(0);
            $table->addColumn('attach_count', 'int')->setDefault(0);
            $table->addColumn('ends_on', 'int')->setDefault(0);
            $table->addColumn('created_date', 'int')->setDefault(0);
            $table->addColumn('timezone', 'mediumtext');
            $table->addColumn('starting_bid', 'int')->setDefault(0);
            $table->addColumn('bid_increament', 'int')->setDefault(0);
            $table->addColumn('shipping_term', 'mediumtext');
            $table->addColumn('ships_via', 'mediumtext');
            $table->addColumn('auction_guidelines', 'tinyint', 3)->setDefault(0);
            $table->addColumn('bumping_rules', 'tinyint', 3)->setDefault(0);
            $table->addColumn('watch_thread', 'tinyint', 3)->setDefault(0);
            $table->addColumn('receive_email', 'tinyint', 3)->setDefault(0);
            $table->addColumn('payment_methods', 'mediumblob');
            $table->addColumn('last_bumping', 'int')->setDefault(0);
            $table->addColumn('bumping_counts', 'int')->setDefault(0);
            $table->addKey('user_id');
            $table->addPrimaryKey('auction_id');
        };

        $tables['fs_auction_bidding'] = function (Create $table) {
            /** @var Create|Alter $table */
            $table->addColumn('bidding_id', 'int')->autoIncrement();
            $table->addColumn('user_id', 'int')->setDefault(0);
            $table->addColumn('auction_id', 'int')->setDefault(0);
            $table->addColumn('created_at', 'int')->setDefault(0);
            $table->addColumn('bidding_amount', 'int')->setDefault(0);
            $table->addPrimaryKey('bidding_id');
        };

        $tables['fs_auction_read'] = function (Create $table) {
            /** @var Create|Alter $table */
            $table->addColumn('auction_read_id', 'int')->autoIncrement();
            $table->addColumn('user_id', 'int')->setDefault(0);
            $table->addColumn('auction_id', 'int')->setDefault(0);
            $table->addColumn('auction_read_date', 'int');
            $table->addPrimaryKey('auction_read_id');
        };

        return $tables;
    }

    public function getData()
    {
        $data = [];

        // $data['fs_auction_category'] = "
        //     INSERT INTO 
        //         `fs_auction_category`
        //         (`category_id`, `title`, `description`, `parent_category_id`, `display_order`, `layout_type`,`lft`, `rgt`, `depth`, `breadcrumb_data`, `bid_count`)
        //      VALUES
        //         (1, 'Example category', 'This is an example Auction category.', 0, 100, 'grid_view',3, 6, 0, '[]', 0);
        // ";


        $data['xf_node'] = "
            INSERT INTO 
                `xf_node`
                (`title`, `description`, `node_type_id`, `breadcrumb_data`)
             VALUES
                ('Node  Example 9', 'This is an example Auction node 2.', 'Forum','[]');
        ";

        $type_config_json = '{"allowed_thread_types":[],"allow_answer_voting":false,"allow_answer_downvote":false}';
        $type_config = json_encode($type_config_json);

        $data['xf_forum'] = "
        INSERT INTO 
        `xf_forum`
        (`node_id`, `type_config`,`index_criteria`,`field_cache`, `prefix_cache`, `prompt_cache`)
     VALUES
        (27, $type_config, '[]','[]', '[]', '[]');
        ";


        return $data;
    }
}
