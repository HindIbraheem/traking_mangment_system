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
            $table->string('job_title');
            $table->string('job_step');
            $table->string('job_phase');
            $table->string('full_name');
            $table->string('full_m_name');
            $table->string('marital_sta');
            $table->string('gender');
            $table->string('birth');
            $table->string('ministry')->nullable();
            $table->string('old_ministry')->nullable();
            $table->string('position')->nullable();
            $table->string('job_date')->nullable();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('class_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('clases')->onDelete('cascade');
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
