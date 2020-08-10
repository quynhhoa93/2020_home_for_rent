<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeAsset extends Model
{
    public function information(){
        return $this->hasMany('App\Information','id','id_type');
    }
}
