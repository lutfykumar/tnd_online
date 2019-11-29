<?php

namespace App\Models\TndOnline;

use Illuminate\Database\Eloquent\Model;

class TrainingAct extends Model
{
	protected $connection ='mysql';
	protected $table = 't_training_actual';
	protected $fillable = [
		'training_id', 'schedule_id', 'tanggal'
	];
	public $timestamps = false;
	
	public function schedule()
	{
		return $this->belongsTo(TrainingSchedule::class, 'schedule_id');
	}
	public function training()
	{
		return $this->belongsTo(TrainingPlan::class, 'training_id', 'id');
	}
	public function peserta_act()
	{
		return $this->hasMany(TrainingPesertaAct::class, 'training_act_id');
	}
}
