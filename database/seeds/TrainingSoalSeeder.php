<?php
	
	use Carbon\Carbon;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;
	
	class TrainingSoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('m_training_soal')->insert([
        'local_code' => '1',
		    'training_id' => '1',
		    'urutan' => '1',
		    'soal' => 'Kebakaran Bahan Padat seperti kayu dan kertas, termasuk jenis kebakaran golongan?',
		    'pilihan_a' => 'Golongan A',
		    'pilihan_b' => 'Golongan B',
		    'pilihan_c' => 'Golongan C',
		    'pilihan_d' => 'Golongan D',
		    'jawaban' => '1',
		    'created_at' => Carbon::now(),
		    'updated_at' => Carbon::now()
	    ]);
	    DB::table('m_training_soal')->insert([
        'local_code' => '2',
		    'training_id' => '1',
		    'urutan' => '2',
		    'soal' => 'Dibawah ini yang termasuk APAR, Kecuali?',
		    'pilihan_a' => 'CO2',
		    'pilihan_b' => 'Busa',
		    'pilihan_c' => 'Tepung Kering',
		    'pilihan_d' => 'Kayu',
		    'jawaban' => '1',
		    'created_at' => Carbon::now(),
		    'updated_at' => Carbon::now()
	    ]);
	    DB::table('m_training_soal')->insert([
        'local_code' => '3',
		    'training_id' => '1',
		    'urutan' => '3',
		    'soal' => 'APAR singkatan dari',
		    'pilihan_a' => 'Alat Pematik Api Ringan',
		    'pilihan_b' => 'Alat Pemadam Api Ringan',
		    'pilihan_c' => 'Alat Pendingin Api Ringan',
		    'pilihan_d' => 'Alat Pembunuh Api Ringan',
		    'jawaban' => '1',
		    'created_at' => Carbon::now(),
		    'updated_at' => Carbon::now()
	    ]);
    }
}
