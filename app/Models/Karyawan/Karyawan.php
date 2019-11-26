<?php

namespace App\Models\Karyawan;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
   protected $connection  ='mysql2';
   protected $table = 'karyawan';
   
   public function department(){
       return $this->belongsTo('App\Karyawan\Department', 'department_id', 'id');
   }
   public function bagian(){
       return $this->belongsTo('App\Karyawan\Bagian', 'bagian_id', 'id');
   }
   public function posisi(){
       return $this->belongsTo('App\Karyawan\Posisi', 'posisi_id', 'id');
   }
   public function trainer(){
       return $this->belongsTo('App\trainer', 'trainer_id');
   }
   public function trainingPeserta(){
       return $this->belongsTo('App\trainingPeserta', 'peserta_id');
   }
   public function trainingAct(){
       return $this->belongsTo('App\trainingAct', 'karyawan_id)');
   }
   public function pesertaAct(){
       return $this->belongsTo('App\pesertaAct', 'karyawan_id)');
   }
   public function user()
   {
       return $this->hasOne('App\User', 'karyawan_id');
   }

}
