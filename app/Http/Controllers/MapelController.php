<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Guru;
use Illuminate\Http\Request;
use Storage;
use Validator;

class MapelController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel=mapel::latest()->paginate(5);
        return view('mapel.index', compact('mapel'));
    }

    // akhir controller

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru=Guru::all();
        return view('mapel.create', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // vallidate form
        $this->validate($request, [
            'mapel'=> 'required',
            'kode_mapel'=> 'required',
        ]);

        $mapel = new mapel();
        $mapel->mapel = $request->mapel;
        $mapel->kode_mapel = $request->kode_mapel;
        $mapel->id_guru = $request->id_guru;


        $mapel->save();
        return redirect()->route('mapel.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mapel=mapel::findOrFail($id);
        return view('mapel.show', compact('mapel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru=Guru::all();
        $mapel=mapel::findOrFail($id);
        return view('mapel.edit', compact('mapel','guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'mapel'=>'required',
            "kode_mapel"=>'required',
        ]);

        $mapel=mapel::findOrFail($id);
        $mapel->mapel=$request->mapel;
        $mapel->kode_mapel = $request->kode_mapel;
        $mapel->id_guru = $request->id_guru;

        // upload mapel
        //     $image=$request->file('image');
        //     $image->storeAs('public/mapels', $image->hashName());

        // // delete mapel
        // Storage::delete('public/mapels/'. $mapel->image);

        // $mapel->image=$image->hashName();
        $mapel->save();
        return redirect()->route('mapel.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel=mapel::findOrFail($id);
        // Storage::delete('public/mapels'. $mapel->image);
        $mapel->delete();
        return redirect()->route('mapel.index');
    }
}
