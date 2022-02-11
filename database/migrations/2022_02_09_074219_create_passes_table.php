<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passes', function (Blueprint $table) {
            $table -> id();
            $table -> unsignedbigInteger('emp_id');
            $table -> foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table -> string('type');
            $table -> string('details');
            $table -> string('provided_by');
            $table -> date('provided_on');
            $table -> date('expires_on');
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
        Schema::dropIfExists('passes');
    }
}
