<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
    public function index() {
    	return Location::All();
    }

    public function show($id) {
    	return Location::find($id);
    }
}
