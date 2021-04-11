<?php

Route::group(['module' => 'Page', 'middleware' => ['api'], 'namespace' => 'App\Modules\Page\Controllers'], function() {

    Route::get('api/channel/{id}/load', 'PageControllerApi@handleLoadChannelContent');
    Route::post('api/channel/{id}/store', 'PageControllerApi@handleStoreChannelContent');
});
