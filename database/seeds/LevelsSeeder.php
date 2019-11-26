<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_levels')->insert([
            'level' => 'hr',
            'created_at' => Carbon::now()
        ]);
         DB::table('m_levels')->insert([
            'level' => 'peserta',
            'created_at' => Carbon::now()
        ]);
    }
}
