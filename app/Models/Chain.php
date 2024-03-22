<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chain extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function locations(){
        return $this->belongsToMany('App\Models\Location');
    }
    public function mailing_lists(){
        return $this->belongsToMany('App\Models\MailingList', 'chain_location_mailing_list')->withTimestamps;
    }
    //CHAIN_CONFIGURATION
    public function configurations(){
        return $this->belongsToMany('App\Models\Configuration');
    }
    public function verifications(){
        return $this->hasMany('App\Models\Verification');
    }
}
