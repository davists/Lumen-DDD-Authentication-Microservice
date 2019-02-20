<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropForeignBankCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->dropForeign('fk_company_bank_id');
            $table->dropIndex('index_company_bank_id');
            $table->dropColumn('company_bank_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->dropForeign('fk_company_bank_id');
            $table->dropIndex('index_company_bank_id');
            $table->dropColumn('company_bank_id');
        });
    }
}
