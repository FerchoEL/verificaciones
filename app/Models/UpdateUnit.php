<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateUnit extends Model
{
    use HasFactory;
    public function unit(){
        return $this->belongsTo('App\Models\Unit');
    }
}
