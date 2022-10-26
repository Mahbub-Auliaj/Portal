<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class PlaceMapController extends Controller
{
    public function index()
    {
        $places = Place::all();
        return view('places.map', compact('places'));
    }
}
