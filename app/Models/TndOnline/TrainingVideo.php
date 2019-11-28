<?php

namespace App\Models\TndOnline;

use Illuminate\Database\Eloquent\Model;

class TrainingVideo extends Model
{
	protected $connection ='mysql';
	protected $table = 'm_training_video';
	protected $fillable = [
		'local_code', 'training_id', 'name', 'slug',
		'id_yt', 'urutan', 'status'
	];
}
