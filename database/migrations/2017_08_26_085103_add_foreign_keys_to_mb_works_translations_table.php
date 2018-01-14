<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMbWorksTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mb_works_translations', function(Blueprint $table)
		{
			$table->foreign('language_code', 'fk_mb_works_translations_mb_language_codes1')->references('language_code')->on('mb_language_codes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('record_id', 'fk_mb_works_translations_mb_works')->references('id')->on('mb_works')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mb_works_translations', function(Blueprint $table)
		{
			$table->dropForeign('fk_mb_works_translations_mb_language_codes1');
			$table->dropForeign('fk_mb_works_translations_mb_works');
		});
	}

}
