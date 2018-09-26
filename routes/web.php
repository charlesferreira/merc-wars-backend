<?php

Route::get('/', function () {
    return 'It works';
});
Route::resource('/players', PlayersController::class);
Route::resource('/players/{id}/mercs', PlayerMercsController::class);
Route::resource('/players/{id}/matches', PlayerMatchesController::class);
Route::resource('/mercs/{id}/teammates', MercTeammatesController::class);

Route::post('/players/{player}/mercs/{merc}/send-for-hiring', 'PlayerMercsController@sendForHiring');

Route::post('/github/webhook', 'GithubController@webhook');
