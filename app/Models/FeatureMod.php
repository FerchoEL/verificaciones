<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureMod extends Model
{
    use HasFactory;
    public function unit(){
        return $this->belongsTo('App\Models\Unit');
    }
}
