<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'axis_one',
        'axis_two',
        'axis_three',
        'brake',
        'suspension',
        'camera',
        'tape',
        'height',
        'width',
        'length',
        'weight',
    ];
    use HasFactory;
    public function unit(){
        return $this->belongsTo('App\Models\Unit');
    }
}
