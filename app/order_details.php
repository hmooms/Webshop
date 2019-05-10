<?php

namespace FullVRGames;

use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    public function orders(){
        $this->hasMany('App/order');
    }
}
