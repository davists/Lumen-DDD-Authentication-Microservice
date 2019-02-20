<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('plan_id')->index('fk_company_1_idx');

			$table->string('name');
            $table->string('cnpj')->unique('cnpj_UNIQUE');
			$table->string('social_reason')->nullable();
            $table->string('email')->unique('email_UNIQUE');
			$table->string('telephone');

			$table->string('address')->nullable();
			$table->string('address_number')->nullable();
			$table->string('address_district')->nullable();
			$table->string('address_complement')->nullable();
			$table->string('zipcode')->nullable();
			$table->integer('country_id')->nullable()->index('fk_company_2_idx');
			$table->integer('state_id')->nullable()->index('fk_company_3_idx');
			$table->integer('city_id')->nullable()->index('fk_company_4_idx');

			$table->string('latitude')->nullable();
			$table->string('longitude')->nullable();
            $table->string('distance_to_zero_referential')->nullable();

            $table->tinyInteger('active')->default(1);

            $table->string('cnae', 45)->nullable();

            $table->text('presentation', 65535)->nullable();
            $table->text('policies', 65535)->nullable();

            $table->string('contact_person')->nullable();
            $table->string('contact_person_telephone')->nullable();

            $table->string('logo')->nullable();
			$table->string('thumbnail')->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company');
	}

}
