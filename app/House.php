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
        'region',
        'city',
        'address',
        'postal_code',
        'house_number',
        'lat',
        'long',
        'image',
        'visibility',
        'user_id',
        'image_original_name'
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

    public function services(){
        return $this->belongsToMany('App\Service');
    }

    public function sponsors(){
        return $this->belongsToMany('App\Sponsor');
    }

}
