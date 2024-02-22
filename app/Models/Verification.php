<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;
    public function fields(){
        return $this->belongsToMany('App\Models\Field','verification_details');
    }
    public function typeVerification(){
        return $this->belongsTo('App\Models\TypeVerification');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function location(){
        return $this->belongsTo('App\Models\Location');
    }
    public function chain(){
        return $this->belongsTo('App\Models\Chain');
    }
    public function configuration(){
        return $this->belongsTo('App\Models\Configuration');
    }
    public function haulier(){
        return $this->belongsTo('App\Models\Haulier');
    }
    public function statusVerification(){
        return $this->belongsTo('App\Models\StatusVerification');
    }

    public function verificationLicensePlate(){
        return $this->hasOne('App\Models\VerificationLicensePlate');
    }
}
