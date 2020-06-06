<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index()
    {
    	return view(
    		'locations.index',
    		 // ['user' => User::findOrFail($id)]
		);
    }
}
