<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    public function TypeAsset(){
        return $this->belongsTo('App\TypeAsset','id_type');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
