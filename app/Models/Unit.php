<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    public function haulier(){
        return $this->belongsTo('App\Models\Haulier');
    }
    public function catalog_special_features(){
        return $this->belongsToMany('App\Models\CatalogSpecialFeature','special_features')->withTimestamps;
    }
    public function types(){
        return $this->belongsToMany('App\Models\Type','special_features')->withTimestamps;
    }
    //units
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function vehicle(){
        return $this->belongsTo('App\Models\Vehicle');
    }
    public function component(){
        return $this->belongsTo('App\Models\Component');
    }
    public function entity(){
        return $this->belongsTo('App\Models\Entity');
    }
    public function carBrand(){
        return $this->belongsTo('App\Models\CarBrand');
    }//end units
    //relation
    public function updateUnit(){
        return $this->hasOne('App\Models\UpdateUnit');
    }
    public function feature(){
        return $this->hasOne('App\Models\Feature');
    }
    public function featureMod(){
        return $this->hasOne('App\Models\FeatureMod');
    }
    public function featureMotorUnit(){
        return $this->hasOne('App\Models\FeatureMotorUnit');
    }
    public function unitDocument(){
        return $this->hasOne('App\Models\UnitDocument');
    }


    public function verificationLicensePlate()
    {
        return $this->hasOne('App\Models\VerificationLicensePlate');
    }
}
