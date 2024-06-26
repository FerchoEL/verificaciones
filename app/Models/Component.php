<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    protected $fillable = [
        'component',
        'motor',
    ];
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
    public function units(){
        return $this->hasMany('App\Models\Unit');
    }
    public function carBrands(){
        return $this->belongsToMany('App\Models\CarBrand');
    }
}
