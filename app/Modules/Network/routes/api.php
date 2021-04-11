<?php

Route::group(['module' => 'Network', 'middleware' => ['api'], 'namespace' => 'App\Modules\Network\Controllers'], function() {

    Route::resource('Network', 'NetworkController');

});
