<?php

Route::get('/', function() {
    return 'It works?';
});
Route::resource('/players', PlayersController::class);
Route::resource('/players/{id}/mercs', PlayerMercsController::class);
Route::resource('/mercs/{id}/teammates', MercTeammatesController::class);
