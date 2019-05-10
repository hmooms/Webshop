<?php

namespace FullVRGames;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function user(){
        $this->hasOne('App/user');
    }

    public function product(){
        $this->hasOne('App/product');
    }

    public function order_details(){
        $this->belongsTo('App/order_details');
    }
}
