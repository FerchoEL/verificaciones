<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailValue extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'field_id',
        'satisfy',
    ];
    public function field(){
        return $this->belongsTo('App\Models\Field');
    }
}
