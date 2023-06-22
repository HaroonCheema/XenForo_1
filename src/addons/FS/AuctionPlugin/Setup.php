<?php

namespace FS\AuctionPlugin;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;

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
		// 	$sm->createTable($tableName, $callback);
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

		// $this->alterTable('xf_thread', function (\XF\Db\Schema\Alter $table) {

		// 	$table->addColumn('auction_end_date', 'int')->setDefault(0);
		// });

		// $this->insertDefaultData();
	}

	public function uninstallStep1()
	{
		$sm = $this->schemaManager();

		// foreach (array_keys($this->getTables()) as $tableName) {
		// 	$sm->dropTable($tableName);
		// }

		// $sm->dropTable('fs_auction_ship_terms');
		// $sm->dropTable('fs_auction_ship_via');

		// $this->schemaManager()->alterTable('xf_user', function (\XF\Db\Schema\Alter $table) {
		// 	$table->dropColumns(['layout_type']);
		// });

		// $this->schemaManager()->alterTable('xf_thread', function (\XF\Db\Schema\Alter $table) {
		// 	$table->dropColumns(['auction_end_date']);
		// });

		// $db = \XF::db();
		// $db->delete('xf_attachment', "content_type = 'fs_auction'");
	}

	public function insertDefaultData()
	{
		if (!$this->addOn->isInstalled()) {
			$db = $this->app->db();
			$data = $this->getData();
			foreach ($data as $dataQuery) {
				$db->query($dataQuery);
			}

			return count($data);
		}
	}

	protected function getTables()
	{
		$data = new MySql();
		return $data->getTables();
	}

	protected function getData()
	{
		$data = new MySql();
		return $data->getData();
	}
}
