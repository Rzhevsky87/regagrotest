<?php

use Illuminate\Support\Facades\Route;


/**
 * Controller namespace App\Http\Controllers\Locationsroutes
 * prefix loc 
 * base path routes/Locations/
 *
 */
Route::prefix('/')->middleware('web')->group(function () {
    Route::get('/', 'LocationsController@index')
    	->name('locations');
    Route::get('getLocations', 'LocationsController@getLocations')
    	->name('getLocations');
    Route::post('storeLocation', 'LocationsController@storeLocation')
    	->name('storeLocation');
});