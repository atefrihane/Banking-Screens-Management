<?php

Route::group(['module' => 'Player', 'middleware' => ['api'], 'namespace' => 'App\Modules\Player\Controllers'], function() {

    Route::post('api/player/update', 'PlayerControllerApi@handleUpdatePlayer');
    Route::get('api/player/{id}/download', 'PlayerControllerApi@handleDownloadZip')->name('handleDownloadZip');
    Route::get('api/player/{id}/url', 'PlayerControllerApi@handleGetUrl')->name('handleGetUrl');
});
