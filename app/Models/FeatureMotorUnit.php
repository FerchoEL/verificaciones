<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureMotorUnit extends Model
{
    use HasFactory;
    protected $fillable = [
        'electric_motor',
        'horsepower',
        'torque',
        'traction',
        'capacity',
        'auxiliary',
        'regulator'
    ];
    public function unit(){
        return $this->belongsTo('App\Models\Unit');
    }
}
