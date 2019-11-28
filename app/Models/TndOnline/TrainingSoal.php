<?php

namespace App\Models\TndOnline;

use Illuminate\Database\Eloquent\Model;

class TrainingSoal extends Model
{
	protected $connection ='mysql';
	protected $table = 'm_training_soal';
	protected $fillable = [
		'local_code','training_id', 'soal', 'pilihan_a', 'pilihan_b', 'pilihan_c',
		'pilihan_d', 'jawaban'
	];
}
