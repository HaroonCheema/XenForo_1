<?php

namespace FS\BunnyIntegration;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;

class Setup extends AbstractSetup
{
	use StepRunnerInstallTrait;
	use StepRunnerUpgradeTrait;
	use StepRunnerUninstallTrait;

	public function installstep1()
	{
		// $this->alterTable('xf_thread', function (\XF\Db\Schema\Alter $table) {
		// 	$table->addColumn('bunny_lib_id', 'int')->setDefault(0);
		// 	$table->addColumn('bunny_vid_id', 'mediumtext')->nullable()->setDefault(null);
		// 	$table->addColumn('is_uploaded', 'int')->setDefault(0);
		// });

		$this->alterTable('xf_job', function (\XF\Db\Schema\Alter $table) {
			$table->changeColumn('execute_data', 'LONGBLOB');
		});
	}

	public function uninstallStep1()
	{
		// $this->schemaManager()->alterTable('xf_thread', function (\XF\Db\Schema\Alter $table) {
		// 	$table->dropColumns(['bunny_lib_id']);
		// 	$table->dropColumns(['bunny_vid_id']);
		// 	$table->dropColumns(['is_uploaded']);
		// });

		$this->schemaManager()->alterTable('xf_job', function (\XF\Db\Schema\Alter $table) {
			$table->changeColumn('execute_data', 'MEDIUMBLOB');
		});
	}
}
