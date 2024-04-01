<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'unit_photo',
        'image_cer_FM',
        'validity_cer_FM',
        'image_pol_seg',
        'validity_pol_seg',
        'image_cer_nem',
        'validity_cer_nem',
        'image_mtto',
        'validity_mtto',
    ];
    public function unit(){
        return $this->belongsTo('App\Models\Unit');
    }
}
