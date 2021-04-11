<?php

Route::group(['module' => 'Role', 'middleware' => ['web', 'auth'], 'namespace' => 'App\Modules\Role\Controllers'], function () {
    Route::view('role', 'Role::showRoles')->name('showRoles');
    Route::view('role/add', 'Role::showAddRole')->name('showAddRole');
    Route::get('role/{id}/update', 'RoleController@showUpdateRole')->name('showUpdateRole');

});
