<?php

namespace VRSense;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function user(){
        $this->hasOne('VRSense/user');
    }

    public function product(){
        $this->hasOne('VRSense/product');
    }

    public function order_details(){
        $this->belongsTo('VRSense/order_details');
    }
}
