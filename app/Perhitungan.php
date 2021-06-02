<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    protected $guarded = [];

    public function karyawan()
    {
    	return $this->belongsTo('App\Karyawan','karyawan_id');
    }
}
