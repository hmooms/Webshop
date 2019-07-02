<?php

namespace VRSense;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function products(){
        return $this->hasMany('VRSense\product');
    }
}
