<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_records', function (Blueprint $table) {
            $table -> id();
            $table -> unsignedbigInteger('emp_id');
            $table -> foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table -> decimal('current_rate',10,2);
            $table -> decimal('previous_rate',10,2)->nullable();
            $table -> decimal('adjustment',10,2)->nullable();
            $table -> decimal('current_loan',10,2)->nullable();
            $table -> decimal('to_deduct',10,2)->nullable();
            $table -> decimal('allowance',10,2)->nullable();
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_records');
    }
}
