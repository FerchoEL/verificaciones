<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    use HasFactory;
    public function locations(){
        return $this->hasMany('App\Models\Location');
    }
    public function direction(){
        return $this->belongsTo('App\Models\Direction');
    }
}
