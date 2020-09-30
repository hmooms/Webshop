<?php

namespace VRSense;

use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    public function orders(){
        return $this->hasMany('VRSense\order');
    }
}
