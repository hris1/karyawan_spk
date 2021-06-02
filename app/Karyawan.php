<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $guarded = [];

    public function alternatif()
    {
    	return $this->hasOne('App\Alternatif','karyawan_id');
    }

    public function perhitungan()
    {
    	return $this->hasOne('App\Perhitungan','karyawan_id');
    }
}
