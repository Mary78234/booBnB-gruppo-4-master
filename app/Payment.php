<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'house_sponsor';

    public function houses(){
        return $this->belongsToMany('App\House');
    }

    public function sponsors(){
        return $this->belongsToMany('App\Sponsor');
    }
}
