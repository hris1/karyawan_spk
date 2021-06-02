<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    protected $guarded = [];

    public function kriteria()
    {
    	return $this->belongsTo('App\Kriteria','kriteria_id');
    }
}
