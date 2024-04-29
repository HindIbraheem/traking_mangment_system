<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('job_number');
            $table->string('full_name');
            $table->string('full_m_name');
            $table->boolean('marital_sta');
            $table->boolean('gender');
            $table->date('birth');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('vacation_id')->nullable();
            $table->unsignedBigInteger('eductaion_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('clases')->onDelete('cascade');
            $table->foreign('vacation_id')->references('id')->on('vacationes')->onDelete('cascade');
            $table->foreign('eductaion_id')->references('id')->on('eductaiones')->onDelete('cascade');
            $table->string('total_normal_vacation')->default('0');
            $table->string('total_timer_vacation')->default('0');
            $table->string('total_sick_vacation')->default('0');
            $table->text('notes')->nullable();
            $table->tinyInteger('vertified')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes');
    }
}
