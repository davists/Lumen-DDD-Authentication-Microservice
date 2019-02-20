<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('state', function(Blueprint $table)
		{
			$table->foreign('country_id', 'fk_state_1')->references('id')->on('country')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('state', function(Blueprint $table)
		{
			$table->dropForeign('fk_state_1');
		});
	}

}
