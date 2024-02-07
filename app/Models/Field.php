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
}
