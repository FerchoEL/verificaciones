<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    public function types(){
        return $this->belongsToMany('App\Models\Type','configurations');
    }
    public function components(){
        return $this->belongsToMany('App\Models\Component','component_configuration')->withTimestamps;
    }
}
