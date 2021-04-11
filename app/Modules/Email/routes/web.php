<?php

Route::group(['module' => 'Email', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Email\Controllers'], function() {

    Route::view('/emails','Email::showEmails')->name('showEmails');
    Route::view('/email/add','Email::showAddEmail')->name('showAddEmail');
    Route::get('/email/{id}/update','EmailController@showUpdateEmail')->name('showUpdateEmail');
});
