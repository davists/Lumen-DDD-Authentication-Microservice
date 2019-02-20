<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCompanyTableAddBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->string('bank', 105);
            $table->string('bank_code', 45);
            $table->string('agency', 45);
            $table->string('agency_vd', 45);
            $table->string('account', 45);
            $table->string('account_vd', 45);
            $table->string('account_type', 100);
            $table->string('document_number', 100);
            $table->string('legal_name');
            $table->string('recipient_id', 100)->nullable();
            $table->string('split_percentage', 10);
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
           //
        });
    }
}
