<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_training_soal', function (Blueprint $table) {
            $table->increments('id');
	          $table->string('local_code')->unique();
            $table->unsignedInteger('training_id');
            $table->text('soal');
            $table->string('pilihan_a');
            $table->string('pilihan_b');
            $table->string('pilihan_c');
            $table->string('pilihan_d');
            $table->string('jawaban');
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
        Schema::dropIfExists('m_training_soal');
    }
}
