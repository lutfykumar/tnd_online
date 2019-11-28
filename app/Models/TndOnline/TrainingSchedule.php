<?php

namespace App\Models\TndOnline;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TrainingSchedule extends Model
{
	protected $connection ='mysql';
	protected $table = 't_schedule';
	protected $fillable = [
		'local_code', 'training_id', 'user_id', 'date_from',
		'date_finish', 'broadcast', 'type'
	];
	
	public function peserta()
	{
		return $this->belongsToMany(User::class, 't_schedule_peserta', 'schedule_id', 'peserta_id');
	}
	
}
