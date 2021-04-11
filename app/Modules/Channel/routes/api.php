<?php

Route::group(['module' => 'Channel', 'middleware' => ['api'], 'namespace' => 'App\Modules\Channel\Controllers'], function() {

    Route::post('channel/{id}/upload', 'ChannelApiController@handleUploadZip')->name('handleUploadZip');

});
