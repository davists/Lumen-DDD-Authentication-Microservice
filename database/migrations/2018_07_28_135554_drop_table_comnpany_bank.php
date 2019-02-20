<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTableComnpanyBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('company_bank');
    }

    /**
     * Reverse the migrations.
     *
     * @return voidCompany.php
     */
    public function down()
    {
        //
    }
}
