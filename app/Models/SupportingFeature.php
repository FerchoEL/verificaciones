<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportingFeature extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_id',
        'electric_motor',
        'horsepower',
        'torque',
        'traction',
        'capacity',
        'brake',
        'auxiliary',
        'camera',
        'regulator',
        'tape',
    ];
    public function vehicle(){
        return $this->belongsTo('App\Models\Vehicle');
    }
}
