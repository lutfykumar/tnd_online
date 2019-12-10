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
		        $table->string('kehadiran')->nullable();
		        $table->string('pre')->nullable();
		        $table->string('post')->nullable();
		        $table->string('efektifitas')->nullable();
		        $table->string('satu')->nullable();
		        $table->string('dua')->nullable();
		        $table->string('tiga')->nullable();
		        $table->string('empat')->nullable();
		        $table->string('lima')->nullable();
		        $table->string('enam')->nullable();
		        $table->string('tujuh')->nullable();
		        $table->string('delapan')->nullable();
		        $table->string('sembilan')->nullable();
		        $table->string('sepuluh')->nullable();
		        $table->string('sebelas')->nullable();
		        $table->string('duabelas')->nullable();
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
