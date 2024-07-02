<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacationesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacationes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('dep_id');
            $table->foreign('dep_id')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('vacation_type_id');
            $table->foreign('vacation_type_id')->references('id')->on('vacation_types')->onDelete('cascade');
            $table->dateTime('from_day')->nullable();
            $table->dateTime('to_day')->nullable();
            $table->dateTime('from_time')->nullable();
            $table->dateTime('to_time')->nullable();
            $table->string('vacation_purpoes')->nullable();
            $table->boolean('mag_classes_aprove')->default('0');
            $table->boolean('mag_department_aprove')->default('0');
            $table->text('vacation_note')->nullable();
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
        Schema::dropIfExists('vacationes');
    }
}
