<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'beds',
        'bathrooms',
        'square_metre',
        'country',
        'city',
        'address',
        'lat',
        'long',
        'image',
        'visibility',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function messages(){
        return $this->hasMany('App\Message');
    }

    public function views(){
        return $this->hasMany('App\View');
    }

    public function features(){
        return $this->belongsToMany('App\Feature');
    }

    public function sponsors(){
        return $this->belongsToMany('App\Sponsor');
    }

}
