<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_bank', function (Blueprint $table) {
            $table->integer('id', true);
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
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_bank');
    }
}
