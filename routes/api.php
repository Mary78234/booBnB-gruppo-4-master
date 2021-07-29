<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')
        ->group(function(){
            Route::get('houses/','HouseController@index')->name('api.houses');
            Route::get('houses/alldata/', 'HouseController@alldata')->name('api.alldata');
            Route::get('houses/advsearch/', 'HouseController@advsearch')->name('api.advsearch');
            Route::get('houses/{slug}','HouseController@show')->name('show');
        });