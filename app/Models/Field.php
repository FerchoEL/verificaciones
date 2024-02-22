<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    public function verifications(){
        return $this->belongsToMany('App\Models\Verification','verification_details');
    }
    //CONFIGURATION_FIELD
    public function configurations(){
        return $this->belongsToMany('App\Models\Configuration');
    }
    //CONFIGURATION_FIELD_MOD
    public function modifiedConfigurations(){
        return $this->belongsToMany('App\Models\Configuration','configuration_field_mod');
    }
    public function detailValues(){
        return $this->hasMany('App\Models\DetailValue');
    }
}
