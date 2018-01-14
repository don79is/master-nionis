<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMbWorksResourcesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mb_works_resources_connections', function(Blueprint $table)
		{
			$table->foreign('resource_id', 'fk_mb_works_resources_connections_mb_resources1')->references('id')->on('mb_resources')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('work_id', 'fk_mb_works_resources_connections_mb_works1')->references('id')->on('mb_works')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mb_works_resources_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_mb_works_resources_connections_mb_resources1');
			$table->dropForeign('fk_mb_works_resources_connections_mb_works1');
		});
	}

}
