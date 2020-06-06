<?php

use Illuminate\Support\Facades\Route;


/**
 * Controller namespace App\Http\Controllers\Locationsroutes
 * prefix loc 
 * base path routes/Locations/
 *
 */
Route::prefix('/')->group(function () {
    Route::get('/', 'LocationsController@index');
});