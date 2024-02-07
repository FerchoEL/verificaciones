<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    public function haulier(){
        return $this->belongsTo('App\Models\Haulier');
    }
    public function catalog_special_features(){
        return $this->belongsToMany('App\Models\CatalogSpecialFeature','special_features')->withTimestamps;
    }
    public function types(){
        return $this->belongsToMany('App\Models\Type','special_features')->withTimestamps;
    }
}
