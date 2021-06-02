<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $guarded = [];

    public function subKriteria()
    {
    	return $this->hasMany('App\SubKriteria','kriteria_id');
    }
}
