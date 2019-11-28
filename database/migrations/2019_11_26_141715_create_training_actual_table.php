<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingActualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_training_actual', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('training_id');
            $table->unsignedInteger('schedule_id');
            $table->dateTime('tanggal');
            $table->timestamps();
            $table->dropTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_training_actual');
    }
}
