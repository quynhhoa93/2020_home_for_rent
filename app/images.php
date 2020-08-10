<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    protected $table = "images";

    public function information()
    {
    	return $this->belongsTo('App\Information','id','information_id');
    }
}
