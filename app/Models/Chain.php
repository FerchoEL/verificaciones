<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chain extends Model
{
    use HasFactory;
    public function mailing_lists(){
        return $this->belongsToMany('App\Models\MailingList', 'chain_location_mailing_list')->withTimestamps;
    }
}
