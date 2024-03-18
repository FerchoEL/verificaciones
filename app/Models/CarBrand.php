<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
    ];
    public function units(){
        return $this->hasMany('App\Models\Unit');
    }
    public function components(){
        return $this->belongsToMany('App\Models\Component');
    }
}
