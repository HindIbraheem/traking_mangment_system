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
            $table->unsignedBigInteger('employ_id');
            $table->foreign('employ_id')->references('id')->on('employes')->onDelete('cascade');
            $table->unsignedBigInteger('dep_id');
            $table->foreign('dep_id')->references('id')->on('departments')->onDelete('cascade');
            $table->bigInteger('vacation_type');
            $table->dateTime('from_day')->nullable();
            $table->dateTime('to_day')->nullable();
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
