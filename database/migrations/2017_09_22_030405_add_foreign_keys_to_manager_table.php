<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToManagerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('manager', function(Blueprint $table)
		{
			$table->foreign('company_id', 'fk_manager_1')->references('id')->on('company')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_manager_2')->references('id')->on('user')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('manager', function(Blueprint $table)
		{
			$table->dropForeign('fk_manager_1');
			$table->dropForeign('fk_manager_2');
		});
	}

}
