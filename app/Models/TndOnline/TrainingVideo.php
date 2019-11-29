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
	
	public function training() {
		return $this->belongsTo(TrainingPlan::class, 'training_id');
	}
	
	public function view_video() {
		return $this->hasMany(TrainingVideoViews::class, 'video_id');
	}
	
	public function scopePublished($query)
	{
		return $query->where('status', true);
	}
}
