<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $perPage = 5;

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
