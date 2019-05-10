<?php

namespace FullVRGames;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function products(){
        $this->hasMany('App/product');
    }
}
