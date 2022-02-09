<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('employees')) {
            Schema::create('employees', function (Blueprint $table) {
                $table->id();
                $table->string('fName');
                $table->string('mName')->nullable();
                $table->string('lName');
                $table->char('sex');
                $table->date('bDate');
                $table->string('address');
                $table->bigInteger('contactNum1');
                $table->bigInteger('contactNum2')->nullable();
                $table->string('profilePicSrc')->nullable();
                // $table->bigInteger('emp_id');
                // $table->string('position1');
                // $table->string('position2')->nullable();
                // $table->string('position3')->nullable();
                // $table->string('department');
                // $table->string('employmentStatus');
                // $table->longText('remarks')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     // Schema::dropIfExists('employees');
    // }
}
