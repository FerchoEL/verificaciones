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
}
