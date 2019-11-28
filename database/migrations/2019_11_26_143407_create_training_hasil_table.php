<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingHasilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_training_hasil', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('schedule_id');
            $table->unsignedInteger('peserta_id');
            $table->string('kehadiran');
            $table->string('pretest')->default('0');
            $table->string('postest')->default('0');
            $table->string('hasil')->default('0');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('t_training_hasil');
    }
}
