<?php

namespace FullVRGames;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function orders(){
        $this->belongsToMany('App/order');
    }

    public function categories(){
        $this->belongsToMany('App/category');
    }
}
