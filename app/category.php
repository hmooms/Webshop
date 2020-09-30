<?php

namespace VRSense;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $timestamps = false;

    public function products(){
        return $this->belongsToMany('VRSense\product');
    }
}
