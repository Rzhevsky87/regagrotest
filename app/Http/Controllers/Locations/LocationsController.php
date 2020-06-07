<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Locations\LocationsCollection;
use App\Locations\Location;
use App\Locations\GeoData;

class LocationsController extends Controller
{
    public function index()
    {
    	return view(
    		'locations.locationsTable',
    		 // ['user' => User::findOrFail($id)]
		);
    }

    public function getLocations($error = null)
    {
    	// $geoData = new GeoData('Уфа, Ленина, д.2');
    	// dd($geoData->getGeoData());
    	// dd(Location::all());
    	// return new LocationsCollection(Location::first());
    	return new LocationsCollection(
    		[
	    		'locations' => Location::all(), 
	    		'error' => $error
    		]
        );
    }

    public function storeLocation(Request $request)
    {
    	$geoData = new GeoData($request->name);
    	$geoData = $geoData->getGeoData();
    	
    	if(!$geoData){
    		redirect()->route('getLocations', ['$error' => 1]);
    	}


    	$location = new Location;
    	$location->name = $request->name;
    	$location->latitude = $geoData[1];
    	$location->longitude = $geoData[0];
    	$location->population_count = $request->population_count;
    	$location->save();

  //   	return response()->json([
		//     'latitude' => $geoData[1],
		//     'longitude' => $geoData[0]
		// ]);
    }
}
