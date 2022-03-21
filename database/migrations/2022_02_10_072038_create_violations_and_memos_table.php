<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViolationsAndMemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violations_and_memos', function (Blueprint $table) {
            $table -> id();
            $table -> unsignedbigInteger('emp_id');
            $table -> foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table -> string('type');
            $table -> string('details')->nullable();
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
        Schema::dropIfExists('violations_and_memos');
    }
}
