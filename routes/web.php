<?php

Route::resource('/players', PlayersController::class);
Route::resource('/players/{id}/mercs', PlayerMercsController::class);
