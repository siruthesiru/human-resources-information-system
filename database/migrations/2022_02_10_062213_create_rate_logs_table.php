<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_logs', function (Blueprint $table) {
            $table -> id();
            $table -> unsignedbigInteger('emp_id');
            $table -> foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table -> decimal('rate_from',10,2)->nullable();
            $table -> decimal('rate_to',10,2)->nullable();
            $table -> date('date_changed');
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
        Schema::dropIfExists('rate_logs');
    }
}
