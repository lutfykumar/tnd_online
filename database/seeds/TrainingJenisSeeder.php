<?php

use Carbon\Carbon;
  use Illuminate\Database\Seeder;
  use Illuminate\Support\Facades\DB;

class TrainingJenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_training_jenis')->insert([
        'name' => 'Mandatori',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ]);
      DB::table('m_training_jenis')->insert([
        'name' => 'Softskill',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ]);
      DB::table('m_training_jenis')->insert([
        'name' => 'Hardskill',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ]);
    }
}
