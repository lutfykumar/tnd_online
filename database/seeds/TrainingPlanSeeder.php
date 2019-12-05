<?php
	
	use Carbon\Carbon;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;
	
	class TrainingPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('m_training_plan')->insert([
		    'local_code' => '1',
        'kode' => 'TI-01',
		    'nama_training' => 'K3 Kebakaran (APAR)',
		    'kategori_id' => 'in',
		    'jenis' => '1',
		    'pelaksana' => 'LNK',
		    'plan' => '12-2019',
		    'department_id' => '11',
		    'jam' => '2',
		    'biaya' => '0',
		    'total' => '0',
		    'trainer_id' => '519',
		    'created_at' => Carbon::now(),
		    'updated_at' => Carbon::now()
	    ]);
    }
}
