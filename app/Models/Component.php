<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    /*public function vehicles(){
        return $this->belongsToMany('App\Models\Vehicle','component_configuration')->withTimestamps;
    }
    public function types(){
        return $this->belongsToMany('App\Models\Type','component_configuration')->withTimestamps;
    }*/
    //COMPONENT_CONFIGURATION
    public function configurations(){
        return $this->belongsToMany('App\Models\Configuration');
    }
}
