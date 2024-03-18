<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogSpecialFeature extends Model
{
    use HasFactory;
    protected $fillable = [
        'field',
        'category',
    ];
    public function types(){
        return $this->belongsToMany('App\Models\Type');
    }
    public function units(){
        return $this->belongsToMany('App\Models\Unit','special_features')->withTimestamps;
    }
}
