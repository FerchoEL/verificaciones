<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Haulier extends Model
{
    use HasFactory;
    public function units(){
        return $this->hasMany('App\Models\Unit');
    }
    public function entities(){
        return $this->hasMany('App\Models\Entity');
    }
    public function verifications(){
        return $this->hasMany('App\Models\Verification');
    }
}
