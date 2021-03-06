<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(LevelsSeeder::class);
        // $this->call(UsersSeeder::class);
        $this->call(TrainingJenisSeeder::class);
        $this->call(TrainingPlanSeeder::class);
        $this->call(TrainingSoalSeeder::class);
        $this->call(TrainingVideoSeeder::class);
    }
}
