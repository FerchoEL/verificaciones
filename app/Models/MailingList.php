<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailingList extends Model
{
    use HasFactory;
    public function chains(){
        return $this->belongsToMany('App\Models\Chain', 'chain_location_mailing_list')->withTimestamps;
    }
    public function locations(){
        return $this->belongsToMany('App\Models\Location', 'chain_location_mailing_list')->withTimestamps;
    }
}
