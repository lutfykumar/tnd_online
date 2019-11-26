<?php

namespace App\Models\Karyawan;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'department';
   
   
   public function karyawan(){
       return $this->hasMany('App\Karyawan\Karyawan', 'department_id', 'id');
   }
   public function bagian(){
       return $this->hasMany('App\Karyawan\Bagian', 'department_id', 'id');
   }
   public function trainingPlan(){
       return $this->hasMany('App\trainingPlan', 'department_id');
   }
   public function TeknikalKompetensi(){
       return $this->hasMany('App\TeknikalKompetensi', 'dept_id');
   }
   public function SoftKompetensi(){
       return $this->hasMany('App\SoftKompetensi', 'dept_id');
   }
}
