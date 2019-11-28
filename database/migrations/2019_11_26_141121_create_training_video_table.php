<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_training_video', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('local_code')->unique();
            $table->unsignedInteger('training_id');
            $table->string('name');
            $table->string('slug');
            $table->string('id_yt');
            $table->string('urutan');
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
        Schema::dropIfExists('m_training_video');
    }
}
