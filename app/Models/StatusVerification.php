<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusVerification extends Model
{
    use HasFactory;
    public function verifications(){
        return $this->hasMany('App\Models\Verification');
    }
}
