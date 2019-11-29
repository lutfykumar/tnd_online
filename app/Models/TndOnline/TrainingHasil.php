<?php

namespace App\Models\TndOnline;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TrainingHasil extends Model
{
	protected $connection ='mysql';
	protected $table = 't_training_hasil';
	protected $fillable = [
		'schedule_id', 'peserta_id', 'kehadiran', 'pretest', 'postest',
		'hasil', 'status'
	];
	
	public function schedule() {
		return $this->belongsTo(TrainingSchedule::class, 'schedule_id');
	}
	
	public function peserta() {
		return $this->belongsTo(User::class, 'peserta_id');
	}
}
