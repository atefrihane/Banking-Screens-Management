<?php

Route::group(['module' => 'Media', 'middleware' => ['api'], 'namespace' => 'App\Modules\Media\Controllers'], function() {

    Route::post('api/media/add', 'MediaControllerApi@handleAddMedia');

});
