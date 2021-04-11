<?php

Route::group(['module' => 'Media', 'middleware' => ['web', 'auth'], 'namespace' => 'App\Modules\Media\Controllers'], function () {

    Route::view('media/images', 'Media::showImages')->name('showImages');
    Route::view('media/videos', 'Media::showVideos')->name('showVideos');
    Route::view('media/add', 'Media::showAddMedia')->name('showAddMedia');

});
