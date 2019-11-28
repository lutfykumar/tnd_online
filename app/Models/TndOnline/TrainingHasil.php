<?php

namespace App\Models\TndOnline;

use Illuminate\Database\Eloquent\Model;

class TrainingHasil extends Model
{
	protected $connection ='mysql';
	protected $table = 't_training_hasil';
	protected $fillable = [
		'schedule_id', 'peserta_id', 'kehadiran', 'pretest', 'postest',
		'hasil', 'status'
	];
}
