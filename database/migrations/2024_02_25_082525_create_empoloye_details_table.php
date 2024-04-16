<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     */
    public function up(): void
    {



        Schema::create('empoloye_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('job_number');
            $table->string('fname');
            $table->string('sname');
            $table->string('thname');
            $table->string('foname');
            $table->string('full_m_name');
            $table->boolean('marital_sta');
            $table->boolean('gender');
            $table->date('birth');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('vacation_id')->nullable();
            $table->unsignedBigInteger('eductaion_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            // $table->foreign('class_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('vacation_id')->references('id')->on('vactaions')->onDelete('cascade');
            // $table->foreign('eductaion_id')->references('id')->on('eductaiones')->onDelete('cascade');
            $table->string('total_normal_vacation');
            $table->string('total_timer_vacation');
            $table->string('total_sick_vacation');
            $table->text('notes')->nullable();
            $table->tinyInteger('vertified')->default('0');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('empoloye_details');

    }
};
