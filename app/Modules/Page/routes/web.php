<?php

Route::group(['module' => 'Page', 'middleware' => ['web'], 'namespace' => 'App\Modules\Page\Controllers'], function() {

    Route::get('/channel/{id}/customize', 'PageController@showChannelContent')->name('showChannelContent');
    Route::get('/channel/{id}/page', 'PageController@showChannelPage')->name('showChannelPage');
});
