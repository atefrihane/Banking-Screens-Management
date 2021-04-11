<?php

Route::group(['module' => 'Email', 'middleware' => ['api'], 'namespace' => 'App\Modules\Email\Controllers'], function() {

    Route::resource('Email', 'EmailController');

});
