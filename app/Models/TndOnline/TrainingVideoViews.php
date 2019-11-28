<?php

namespace App\Models\TndOnline;

use Illuminate\Database\Eloquent\Model;

class TrainingVideoViews extends Model
{
	protected $connection ='mysql';
	protected $table = 't_video_views';
	protected $fillable = [
		'peserta_id', 'video_id', 'view'
	];
}
