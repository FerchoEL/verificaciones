<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function catalogSpecialFeatures(){
        return $this->belongsToMany('App\Models\CatalogSpecialFeature');
    }
    public function vehicles(){
        return $this->belongsToMany('App\Models\Vehicle','configurations');
    }
    public function components(){
        return $this->belongsToMany('App\Models\Component','component_configuration')->withTimestamps;
    }
    public function units(){
        return $this->belongsToMany('App\Models\Unit','special_features')->withTimestamps;
    }
}