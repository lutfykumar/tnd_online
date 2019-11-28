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
}
