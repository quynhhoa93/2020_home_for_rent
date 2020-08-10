<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeAsset extends Model
{
    public function informations(){
        return $this->hasMany('App\Information');
    }
}
