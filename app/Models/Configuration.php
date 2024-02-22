<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;
    //CONFIGURATION
    public function vehicle(){
        return $this->belongsTo('App\Models\Vehicle');
    }
    public function type(){
        return $this->belongsTo('App\Models\Type');
    }
    //COMPONENT_CONFIGURATION
    public function components(){
        return $this->belongsToMany('App\Models\Component');
    }
    //CHAIN_CONFIGURATION
    public function chains(){
        return $this->belongsToMany('App\Models\Chain');
    }
    //CONFIGURATION_FIELD
    public function fields(){
        return $this->belongsToMany('App\Models\Field');
    }
    //CONFIGURATION_FIELD_MOD
    public function modifiedFields(){
        return $this->belongsToMany('App\Models\Field','configuration_field_mod');
    }
    public function verifications(){
        return $this->hasMany('App\Models\Verification');
    }
}
