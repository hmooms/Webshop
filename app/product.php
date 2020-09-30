<?php

namespace VRSense;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{  
    public $timestamps = false;
    
    public function categories(){
        return $this->belongsToMany('VRSense\category');
    }
    
}
