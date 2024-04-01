<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureMod extends Model
{
    protected $fillable = [
        'mod_type',
        'mod_motor',
        'mod_brake',
        'mod_suspension',
        'mod_axis',
    ];
    use HasFactory;
    public function unit(){
        return $this->belongsTo('App\Models\Unit');
    }
}
