<?php

namespace App\Models\TndOnline;

use Illuminate\Database\Eloquent\Model;

class TrainingPesertaAct extends Model
{
	protected $connection ='mysql';
	protected $table = 't_actual_peserta';
	protected $fillable = [
		'training_act_id', 'karyawan_id', 'kehadiran', 'pre',
		'post', 'efektifitas', 'satu', 'dua', 'tiga', 'empat',
		'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh',
		'sebelas', 'duabelas'
	];
}
