<?php

Route::group(['module' => 'Planning', 'middleware' => ['api'], 'namespace' => 'App\Modules\Planning\Controllers'], function() {

    Route::resource('Planning', 'PlanningController');

});
