<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'title',
        'content',
        'mail',
        'house_id'
    ];
    public function house(){
        return $this->belongsTo('App\House');
    }
}
