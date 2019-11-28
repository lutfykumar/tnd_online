<?php
	
	use Carbon\Carbon;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;
	
	class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('users')->insert([
		    'local_code' => '1',
		    'karyawan_id' => '519',
		    'name' => 'Administrator',
		    'username' => 'bangchan',
		    'email' => 'lutfhiesita@gmail.com',
		    'password' => bcrypt('adminpass'),
		    'pw' => 'adminpass',
		    'level_id' => '2',
		    'created_at' => Carbon::now(),
		    'updated_at' => Carbon::now()
	    ]);
    }
}
