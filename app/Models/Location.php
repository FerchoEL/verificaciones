<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasMany('App\Models\User');
    }
    public function chains(){
        return $this->belongsToMany('App\Models\Chain');
    }
    public function mailing_lists(){
        return $this->belongsToMany('App\Models\MailingList', 'chain_location_mailing_list')->withTimestamps;
    }
    public function verifications(){
        return $this->hasMany('App\Models\Verification');
    }
}
