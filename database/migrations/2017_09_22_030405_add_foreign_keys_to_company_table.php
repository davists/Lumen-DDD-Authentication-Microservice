<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company', function(Blueprint $table)
		{
			$table->foreign('plan_id', 'fk_company_1')->references('id')->on('plan')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('country_id', 'fk_company_2')->references('id')->on('country')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('state_id', 'fk_company_3')->references('id')->on('state')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('city_id', 'fk_company_4')->references('id')->on('city')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company', function(Blueprint $table)
		{
			$table->dropForeign('fk_company_1');
			$table->dropForeign('fk_company_2');
			$table->dropForeign('fk_company_3');
			$table->dropForeign('fk_company_4');
		});
	}

}
