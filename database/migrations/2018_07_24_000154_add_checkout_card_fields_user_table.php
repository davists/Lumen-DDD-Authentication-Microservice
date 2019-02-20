<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCheckoutCardFieldsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->string('social_id')->nullable();
            $table->string('profile_url')->nullable();
            $table->string('address_zipcode')->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_district')->nullable();
            $table->string('address_number')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_state')->nullable();
            $table->string('telephone')->nullable();
            $table->string('home_telephone')->nullable();
            $table->string('one_click_buy')->nullable();
            $table->string('card_id')->nullable();
            $table->string('cpf')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
}
