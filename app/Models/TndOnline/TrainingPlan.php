<?php

namespace App\Models\TndOnline;

use Illuminate\Database\Eloquent\Model;

class TrainingPlan extends Model
{
	protected $connection ='mysql';
	protected $table = 'm_training_plan';
	protected $fillable = [
		'local_code', 'kode', 'nama_training', 'kategori_id', 'jenis_id',
		'pelaksanaan', 'plan', 'department_id', 'jam',
		'biaya', 'trainer_id'
	];
	
	public function soal()
	{
		return $this->hasMany(TrainingSoal::class, 'training_id');
	}
	
	public  function schedule ()
	{
		return $this->hasOne(TrainingSchedule::class,'training_id');
	}
	
	public  function video ()
	{
		return $this->hasMany(TrainingVideo::class,'training_id');
	}
}
