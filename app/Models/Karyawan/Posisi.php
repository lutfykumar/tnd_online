<?php

namespace App\Models\Karyawan;

use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'posisi';

    public function karyawan()
    {
        return $this->hasMany('App\Karyawan\Karyawan', 'posisi_id', 'id');
    }

    public function teknikalkompetensi_target()
    {
        return $this->hasMany('App\TeknikalKompetensi_target', 'posisi_id', 'id');
    }
    public function softkompetensi_target()
    {
        return $this->hasMany('App\SoftKompetensi_target', 'posisi_id', 'id');
    }
}
