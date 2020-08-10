<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
	protected $table = "information";

    public function user()
    {
    	return $this->belongsTo('App\User','id','id_user');
    }

    public function images(){
        return $this->hasMany('App\images','information_id','id');
    }

    public function typeasset()
    {
    	return $this->belongsTo('App\TypeAsset','id_type','id');
    }
}
