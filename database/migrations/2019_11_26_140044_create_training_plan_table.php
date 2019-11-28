<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_training_plan', function (Blueprint $table) {
            $table->increments('id');
	          $table->string('local_code')->unique();
            $table->string('kode')->unique();
            $table->string('nama_training');
            $table->string('kategori_id');
            $table->string('jenis');
            $table->string('pelaksana');
            $table->string('plan');
            $table->unsignedInteger('department_id');
            $table->string('jam');
            $table->string('biaya');
            $table->string('total');
            $table->unsignedInteger('trainer_id');
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
        Schema::dropIfExists('m_training_plan');
    }
}
