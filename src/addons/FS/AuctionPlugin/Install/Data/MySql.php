<?php

namespace FS\AuctionPlugin\Install\Data;

use SV\Utils\InstallerHelper;
use XF\Db\Schema\Create;
use XF\Db\Schema\Alter;

class MySql
{
    use InstallerHelper;

    public function getTables()
    {
        $tables = [];

        $tables['fs_auction_category'] = function ($table) {
            /** @var Create|Alter $table */
            $this->addOrChangeColumn($table, 'category_id', 'int')->autoIncrement();
            $this->addOrChangeColumn($table, 'title', 'varchar', 100);
            $this->addOrChangeColumn($table, 'description', 'text');
            $this->addOrChangeColumn($table, 'parent_category_id', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'display_order', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'lft', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'rgt', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'depth', 'smallint', 5)->setDefault(0);
            $this->addOrChangeColumn($table, 'breadcrumb_data', 'blob');
            $this->addOrChangeColumn($table, 'bid_count', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'layout_type', 'varchar', 20)->setDefault('list_view');
            $table->addKey(['parent_category_id', 'lft']);
            $table->addUniqueKey('category_id');
            $table->addKey(['lft', 'rgt']);
        };

        $tables['fs_auction_listing'] = function ($table) {
            /** @var Create|Alter $table */
            $this->addOrChangeColumn($table, 'auction_id', 'int')->autoIncrement();
            $this->addOrChangeColumn($table, 'category_id', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'title', 'varchar', 100);
            $this->addOrChangeColumn($table, 'content', 'mediumtext');
            $this->addOrChangeColumn($table, 'user_id', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'prefix_id', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'attach_count', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'ends_on', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'created_date', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'timezone', 'mediumtext');
            $this->addOrChangeColumn($table, 'starting_bid', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'bid_increament', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'shipping_term', 'mediumtext');
            $this->addOrChangeColumn($table, 'ships_via', 'mediumtext');
            $this->addOrChangeColumn($table, 'auction_guidelines', 'tinyint', 3)->setDefault(0);
            $this->addOrChangeColumn($table, 'bumping_rules', 'tinyint', 3)->setDefault(0);
            $this->addOrChangeColumn($table, 'watch_thread', 'tinyint', 3)->setDefault(0);
            $this->addOrChangeColumn($table, 'receive_email', 'tinyint', 3)->setDefault(0);
            $this->addOrChangeColumn($table, 'payment_methods', 'mediumblob');
            $this->addOrChangeColumn($table, 'last_bumping', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'bumping_counts', 'int')->setDefault(0);


            $table->addKey('user_id');
        };

        $tables['fs_auction_bidding'] = function ($table) {
            /** @var Create|Alter $table */
            $this->addOrChangeColumn($table, 'bidding_id', 'int')->autoIncrement();
            $this->addOrChangeColumn($table, 'user_id', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'auction_id', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'created_at', 'int')->setDefault(0);
            $this->addOrChangeColumn($table, 'bidding_amount', 'int')->setDefault(0);
            $table->addUniqueKey('bidding_id');
        };

        return $tables;
    }

    public function getData()
    {
        $data = [];

        $data['fs_auction_category'] = "
            INSERT INTO 
                `fs_auction_category`
                (`category_id`, `title`, `description`, `parent_category_id`, `display_order`, `layout_type`,`lft`, `rgt`, `depth`, `breadcrumb_data`, `bid_count`)
             VALUES
                (1, 'Example category', 'This is an example Classifieds category.', 0, 100, 'grid_view',3, 6, 0, '[]', 0);
        ";
        return $data;
    }
}
