<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'management_id',
    ];
    public function users(){
        return $this->hasMany('App\Models\User');
    }
    public function chains(){
        return $this->belongsToMany('App\Models\Chain');
    }
    /*public function mailing_lists(){
        return $this->belongsToMany('App\Models\MailingList', 'chain_location_mailing_list')->withTimestamps;
    }*/
    public function verifications(){
        return $this->hasMany('App\Models\Verification');
    }
    public function management(){
        return $this->belongsTo('App\Models\Management');
    }
    public function units(){
        return $this->hasMany('App\Models\Units');
    }
}
