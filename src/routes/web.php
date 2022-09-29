<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Jinesh\Forexnp\Http\Controllers'], function() {
    Route::get('forex', 'ForexnpController@index');
});