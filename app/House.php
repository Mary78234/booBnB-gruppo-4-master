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
        'squares_metre',
        'country',
        'city',
        'address',
        'lat',
        'long',
        'image',
        'visibility',
        'user_id'
    ];

    public function Messages(){
        return $this->hasMany('App\Message');
    }

    public function Views(){
        return $this->hasMany('App\View');
    }
}
