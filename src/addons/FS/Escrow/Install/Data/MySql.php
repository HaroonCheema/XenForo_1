<?php

namespace FS\Escrow\Install\Data;

use XF\Db\Schema\Create;
use XF\Db\Schema\Alter;

class MySql
{

    public function getTables()
    {
        $tables = [];

        $tables['fs_escrow_transaction'] = function (Create $table) {
            /** @var Create|Alter $table */
            $table->addColumn('transaction_id', 'int')->autoIncrement();
            $table->addColumn('user_id', 'int')->setDefault(0);
            $table->addColumn('to_user', 'int')->setDefault(0);
            $table->addColumn('transaction_amount', 'int')->setDefault(0);
            $table->addColumn('transaction_type', 'varchar', 100);
            $table->addColumn('current_amount', 'int')->setDefault(0);
            $table->addColumn('created_at', 'int')->setDefault(0);
            $table->addPrimaryKey('transaction_id');
        };

        return $tables;
    }
}
