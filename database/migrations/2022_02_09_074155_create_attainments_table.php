<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttainmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attainments', function (Blueprint $table) {
            $table -> id();
            $table -> unsignedbigInteger('emp_id');
            $table -> foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table -> string('type')->nullable();
            $table -> string('title')->nullable();
            $table -> string('description')->nullable();
            $table -> date('attained_on')->nullable();
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
        Schema::dropIfExists('attainments');
    }
}
