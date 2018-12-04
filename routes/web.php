<?php

Route::get('/', function () {
    return 'It works';
});
Route::resource('/players', PlayersController::class);
Route::resource('/players/{id}/mercs', PlayerMercsController::class);
Route::resource('/players/{id}/equipments', PlayerEquipmentsController::class);
Route::resource('/players/{id}/matches', PlayerMatchesController::class);
Route::resource('/mercs', MercsController::class);
Route::resource('/equipments', EquipmentsController::class);
Route::resource('/mercs/{id}/teammates', MercTeammatesController::class);

Route::get('/mercs/{id}/teammates-inventory', 'MercTeammatesController@inventory');
Route::post('/mercs/{merc}/send-for-hiring', 'MercsController@sendForHiring');

Route::post('/github/webhook', 'GithubController@webhook');
