<?php

Route::group(['module' => 'Planning', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Planning\Controllers'], function() {

    Route::view('/plannings','Planning::showPlannings')->name('showPlannings');
    Route::view('/planning/add','Planning::showAddPlanning')->name('showAddPlanning');
    Route::get('/planning/{id}/update','PlanningController@showUpdatePlanning')->name('showUpdatePlanning');
});
