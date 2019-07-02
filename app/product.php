<?php

namespace VRSense;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function orders(){
        return $this->belongsToMany('VRSense\order');
    }

    public function category(){
        return $this->belongsTo('VRSense\category');
    }
}
