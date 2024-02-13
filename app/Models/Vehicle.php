<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    //MODEL CONFIGURATION
    public function types(){
        return $this->belongsToMany('App\Models\Type','configurations');
    }
    public function configurations(){
        return $this->hasMany('App\Models\Configuration');
    }
    //END MODEL CONFIGURATION
    /*public function components(){
        return $this->belongsToMany('App\Models\Component','component_configuration')->withTimestamps;
    }*/
}
