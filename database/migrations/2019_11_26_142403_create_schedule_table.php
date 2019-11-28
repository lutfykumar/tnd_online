<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('t_schedule', function (Blueprint $table) {
		    $table->increments('id');
		    $table->unsignedInteger('training_id');
		    $table->unsignedInteger('user_id');
		    $table->dateTime('date_from');
		    $table->dateTime('date_finish');
		    $table->boolean('broadcast')->default(false);
		    $table->integer('type');
		    $table->timestamps();
	    });
	    Schema::create('t_schedule_peserta', function (Blueprint $table) {
		    $table->increments('id');
		    $table->unsignedInteger('schedule_id');
		    $table->unsignedInteger('peserta_id');
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
        Schema::dropIfExists('t_schedule');
        Schema::dropIfExists('t_schedule_peserta');
    }
}
