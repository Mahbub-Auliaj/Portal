<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bangka;

class PlaceMapBangkaController extends Controller
{
    public function index()
    {
        $places = Bangka::all();
        return view('bangka.map', compact('places'));
    }
}
