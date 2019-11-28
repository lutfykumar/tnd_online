<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActualPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_actual_peserta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('training_act_id');
            $table->unsignedInteger('karyawan_id');
            $table->integer('kehadiran')->default('0');
            $table->integer('pre')->default('0');
            $table->integer('post')->default('0');
            $table->integer('efektifitas')->default('0');
            $table->integer('satu')->default('0');
            $table->integer('dua')->default('0');
            $table->integer('tiga')->default('0');
            $table->integer('empat')->default('0');
            $table->integer('lima')->default('0');
            $table->integer('enam')->default('0');
            $table->integer('tujuh')->default('0');
            $table->integer('delapan')->default('0');
            $table->integer('sembilan')->default('0');
            $table->integer('sepuluh')->default('0');
            $table->integer('sebelas')->default('0');
            $table->integer('duabelas')->default('0');
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
        Schema::dropIfExists('t_actual_peserta');
    }
}
