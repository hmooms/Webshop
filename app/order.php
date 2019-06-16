<?php

namespace VRSense;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function product(){
        return $this->belongsTo('VRSense\product');
    }

    public function order_details(){
        return $this->belongsTo('VRSense\order_details');
    }
}
