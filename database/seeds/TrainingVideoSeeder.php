<?php
	
	use Carbon\Carbon;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;
	
	class TrainingVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('m_training_video')->insert([
        'local_code' => '1',
		    'training_id' => '1',
		    'name' => 'Video Pertama',
		    'slug' => str_slug('Video pertama'),
		    'id_yt' => 'NuT2-30n-0c',
		    'urutan' => '1',
		    'status' => '1',
		    'created_at' => Carbon::now(),
		    'updated_at' => Carbon::now()
	    ]);
	    DB::table('m_training_video')->insert([
        'local_code' => '2',
		    'training_id' => '1',
		    'name' => 'Video Kedua',
		    'slug' => str_slug('Video kedua'),
		    'id_yt' => 'NuT2-30n-0c',
		    'urutan' => '1',
		    'status' => '1',
		    'created_at' => Carbon::now(),
		    'updated_at' => Carbon::now()
	    ]);
	    DB::table('m_training_video')->insert([
        'local_code' => '3',
		    'training_id' => '1',
		    'name' => 'Video Ketiga',
		    'slug' => str_slug('Video ketiga'),
		    'id_yt' => 'NuT2-30n-0c',
		    'urutan' => '1',
		    'status' => '1',
		    'created_at' => Carbon::now(),
		    'updated_at' => Carbon::now()
	    ]);
    }
}
