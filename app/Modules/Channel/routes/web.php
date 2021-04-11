<?php

Route::group(['module' => 'Channel', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Channel\Controllers'], function() {

    Route::get('channel/{id}/update', 'ChannelController@showUpdateChannel')->name('showUpdateChannel');
    Route::get('channel/{id}/customize', 'ChannelController@showCustomizeChannel')->name('showCustomizeChannel');
    Route::get('channel/{id}/upload', 'ChannelController@showUploadZip')->name('showUploadZip');
    Route::get('channel/{id}/download', 'ChannelController@handleDownloadZip')->name('handleDownloadZip');
});
