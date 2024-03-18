<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Haulier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'idsap',
        'rfc',
        'phone',
        'email',
        'entity_id',
        'city',
        'street',
        'address',
        'cp',
    ];
    public function units(){
        return $this->hasMany('App\Models\Unit');
    }
    public function entity(){
        return $this->belongsTo('App\Models\Entity');
    }
    public function verifications(){
        return $this->hasMany('App\Models\Verification');
    }
}
