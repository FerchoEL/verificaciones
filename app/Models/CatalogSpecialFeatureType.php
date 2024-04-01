<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogSpecialFeatureType extends Model
{
    use HasFactory;
    protected $table = 'catalog_special_feature_type';

    public function catalogSpecialFeature()
    {
        return $this->belongsTo('App\Models\CatalogSpecialFeature');
    }
    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }
    public function units()
    {
        return $this->belongsToMany('App\Models\Unit', 'special_features')
            ->withTimestamps();
    }
}
