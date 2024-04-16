<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVactaionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vactaions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
                   // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('vacation_type');
            $table->date('from_day')->nullable();
            $table->date('to_day')->nullable();
            $table->date('from_time')->nullable();
            $table->date('to_time')->nullable();
            $table->string('vacation_purpoes')->nullable();
            $table->boolean('mag_department_aprove')->nullable();
            $table->boolean('mag_classes_aprove')->nullable();
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
        Schema::dropIfExists('vactaions');
    }
}
