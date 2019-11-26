<?php

namespace App\Models\Karyawan;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $connection ='mysql2';
    protected $table = 'bagian';
   
   public function teknikalkompetensi_target(){
       return $this->hasMany('App\TeknikalKompetensi_target', 'bagian_id', 'id');
   }
   public function softkompetensi_target(){
       return $this->hasMany('App\SoftKompetensi_target', 'bagian_id', 'id');
   }
   public function karyawan(){
       return $this->hasMany('App\Karyawan\Karyawan', 'bagian_id', 'id');
   }
   public function department(){
       return $this->belongsTo('App\Karyawan\Department', 'department_id', 'id');
   }
}
