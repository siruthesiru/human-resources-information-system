<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('employment_infos')) {
            Schema::create('employment_infos', function (Blueprint $table) {

                $table -> id();
                $table -> unsignedbigInteger('emp_id');
                $table -> foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
                $table -> bigInteger('company_id');
                $table -> string('position1');
                $table -> string('position2')->nullable();
                $table -> string('position3')->nullable();
                $table -> string('status');
                $table -> date('hired_on');
                $table -> string('current_location');
                $table -> timestamps();

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employment_infos');
    }
}
