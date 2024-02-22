<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationLicensePlate extends Model
{
    use HasFactory;
    public function verification(){
        return $this->belongsTo('App\Models\Verification');
    }
    //extraer vehicle y component de la tabla unit
    /*public function vehicle(){
        return $this->belongsTo('App\Models\Unit', 'vehicle_id');
    }
    public function component(){
        return $this->belongsTo('App\Models\Unit', 'component_id');
    }*/
    public function unit(){
        return $this->belongsTo('App\Models\Unit');
    }
    //--extraer vehicle y component de la tabla unit
}
