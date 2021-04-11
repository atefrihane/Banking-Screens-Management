<?php

Route::group(['module' => 'Network', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Network\Controllers'], function() {

    Route::view('networks/add', 'Network::showAddNetwork')->name('showAddNetwork');
    Route::get('networks/{id}/update', 'NetworkController@showUpdateNetwork')->name('showUpdateNetwork');
    Route::get('networks/{id}/channels', 'NetworkController@showNetworkChannels')->name('showNetworkChannels');
    Route::get('network/{id}/channel/add', 'NetworkController@showAddNetworkChannel')->name('showAddNetworkChannel');
    Route::get('networks/{id}/players', 'NetworkController@showNetworkPlayers')->name('showNetworkPlayers');
    Route::get('network/{id}/player/add', 'NetworkController@showAddNetworkPlayer')->name('showAddNetworkPlayer');
});
