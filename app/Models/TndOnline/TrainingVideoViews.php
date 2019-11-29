<?php

namespace App\Models\TndOnline;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TrainingVideoViews extends Model
{
	protected $connection ='mysql';
	protected $table = 't_video_views';
	protected $fillable = [
		'peserta_id', 'video_id', 'view'
	];
	
	public function peserta()
	{
		return $this->belongsTo(User::class, 'peserta_id');
	}
	public function video()
	{
		return $this->belongsTo(TrainingVideo::class, 'video_id');
	}
}
