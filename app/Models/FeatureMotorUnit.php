<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureMotorUnit extends Model
{
    use HasFactory;
    public function unit(){
        return $this->belongsTo('App\Models\Unit');
    }
}
