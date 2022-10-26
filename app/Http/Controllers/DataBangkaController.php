<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bangka;

class DataBangkaController extends Controller
{
    public function places()
    {
        $places = Bangka::orderBy('place_name', 'ASC');
        return datatables()->of($places)
            ->addColumn('action', 'bangka.buttons')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
}
