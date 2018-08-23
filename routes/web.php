<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('/players/{id}/mercs', 'PlayerMercsController@store');