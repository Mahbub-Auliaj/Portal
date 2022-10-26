<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Bangka;
use App\Place;

class PlaceBangkaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bangka.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bangka.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'place_name' => 'required|min:3',
            'address'   => 'required|min:10',
            'description' => 'required|min:10',
            'image' => 'image|mimes:png,jpg,jpeg,svg',
            'longitude'  => 'required',
            'latitude'  => 'required'
        ]);

        $img = $request->file('image');
        $img->storeAs('public/gambar', $img->hashName());

        // $imgName = time().'.'.$request->image->extension();
        // $request->image->move(public_path('images'), $imgName);

        Bangka::create([
            'place_name' => $request->place_name,
            'address'  => $request->address,
            'description' => $request->description,
            'image' => $img->hashName(),
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);
        notify()->success('Place has been created');
        return redirect()->route('loc_bangka.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bangka $loc_bangka)
    {
        return view('bangka.detail', [
            'place' => $loc_bangka,
        ]);
        // dd($loc_bangka);
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bangka $loc_bangka)
    {
        return view('bangka.edit', [
            'place' => $loc_bangka,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bangka $loc_bangka)
    {
        $this->validate($request, [
            'place_name' => 'required|min:3',
            'address'   => 'required|min:10',
            'description' => 'required|min:10',
            'image' => 'image|mimes:png,jpg,jpeg,svg',
            'longitude'  => 'required',
            'latitude'  => 'required'
        ]);


        if ($request->file('image') == "") {
            $loc_bangka->update([
                'place_name' => $request->place_name,
                'address'  => $request->address,
                'description' => $request->description,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
            ]);
        } else {

            //hapus image lama
            Storage::disk('local')->delete('public/gambar/'.$loc_bangka->image);

            //upload image baru
            $img = $request->file('image');
            $img->storeAs('public/gambar', $img->hashName());

            $loc_bangka->update([
                'place_name' => $request->place_name,
                'address'  => $request->address,
                'description' => $request->description,
                'image' => $img->hashName(),
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
            ]);
        }

        notify()->info('Place has been updated');
        return redirect()->route('loc_bangka.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bangka $loc_bangka)
    {
        $loc_bangka->delete();
        notify()->warning('Place has been deleted');
        return redirect()->route('loc_bangka.index');
    }
}
