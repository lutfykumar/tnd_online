<?php

namespace App;

use App\Models\Karyawan\Karyawan;
use App\Models\TndOnline\TrainingSchedule;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'level_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function views()
//    {
//        return $this->hasMany('App\Models\View', 'user_id');
//    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
	
	public function schedules () {
		return $this->belongsToMany(TrainingSchedule::class, 't_schedule_peserta', 'peserta_id', 'schedule_id');
	}
}
