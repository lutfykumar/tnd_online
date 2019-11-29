<?php

namespace App\Models\TndOnline;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TrainingSchedule extends Model
{
	protected $connection ='mysql';
	protected $table = 't_schedule';
	protected $dates = ['date_from', 'date_finish'];
	protected $fillable = [
		'local_code', 'training_id', 'user_id', 'date_from',
		'date_finish', 'broadcast', 'type'
	];
	
	public function peserta()
	{
		return $this->belongsToMany(User::class, 't_schedule_peserta', 'schedule_id', 'peserta_id', 'id', 'id');
	}
	
	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}
	
	public function training_hasil() {
		return $this->hasMany(TrainingHasil::class, 'schedule_id');
	}
	
	public function training() {
		return $this->belongsTo(TrainingPlan::class, 'training_id');
	}
	
	public function training_act()
	{
		return $this->hasOne(TrainingAct::class, 'schedule_id');
	}
	
}
