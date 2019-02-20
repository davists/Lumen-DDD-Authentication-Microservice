<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('email')->unique('email_UNIQUE');
			$table->string('password');
			$table->string('profile')->nullable();
			$table->string('thumbnail')->nullable();
			$table->tinyInteger('confirmed')->default(0);
			$table->string('reset_password_token')->nullable();
			$table->string('social_identifier')->nullable();
			$table->string('social_provider')->nullable();

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
		Schema::drop('user');
	}

}
