<?php

Route::group(['module' => 'Player', 'middleware' => ['web'], 'namespace' => 'App\Modules\Player\Controllers'], function () {
    Route::get('player/{id}', 'PlayerController@showPlayer')->name('showPlayer');
  
});
Route::group(['module' => 'Player', 'middleware' => ['web', 'auth'], 'namespace' => 'App\Modules\Player\Controllers'], function () {
 
    Route::get('player/{id}/update', 'PlayerController@showUpdatePlayer')->name('showUpdatePlayer');
    Route::view('/players', 'Player::showPlayers')->name('showPlayers');
    Route::view('/players/off', 'Player::showOffPlayers')->name('showOffPlayers');
});
