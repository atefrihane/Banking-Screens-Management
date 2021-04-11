<?php

Route::group(['module' => 'User', 'middleware' => ['web', 'guest'], 'namespace' => 'App\Modules\User\Controllers'], function () {

    Route::view('/login', 'User::showLogin')->name('showLogin');
    Route::post('/login', 'UserController@handleLogin')->name('handleLogin');

});

Route::group(['module' => 'User', 'middleware' => ['web', 'auth'], 'namespace' => 'App\Modules\User\Controllers'], function () {
    Route::get('/', 'UserController@showHome')->name('showHome');
    Route::get('/logout', 'UserController@handleLogout')->name('handleLogout');

    Route::view('users', 'User::showUsers')->name('showUsers');
    Route::view('user/add', 'User::showAddUser')->name('showAddUser');
    Route::get('user/{id}/update', 'UserController@showUpdateUser')->name('showUpdateUser');

});
