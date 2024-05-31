<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Validator;
use Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan data
        $guru=Guru::latest()->paginate(5);
        return view('Guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validate($request,[
            'nip'=>'required',
            'nama'=>'required',
            'jenis_kelamin'=>['required','boolean'],
            'agama'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'foto'=>'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $guru = new guru();
        $guru -> nip = $request -> nip;
        $guru -> nama = $request -> nama;
        $guru -> jenis_kelamin = $request -> jenis_kelamin;
        $guru -> agama = $request -> agama;
        $guru -> tempat_lahir = $request -> tempat_lahir;
        $guru -> tanggal_lahir = $request -> tanggal_lahir;

        // upload foto
        $image = $request -> file ('foto');
        $image->storeAs('public/gurus/', $image->hashName());
        $guru->foto=$image->hashName();
        $guru->save();
        return redirect()->route('guru.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru=Guru::findOrFail($id);
        return view('Guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru=Guru::findOrFail($id);
        return view('Guru.edit', compact('guru'));
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
        $this->Validate($request,[
            'nip'=>'required',
            'nama'=>'required',
            'jenis_kelamin'=>['required','boolean'],
            'agama'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'foto'=>'required',
        ]);

        $guru=Guru::findOrFail($id);
        $guru -> nip = $request -> nip;
        $guru -> nama = $request -> nama;
        $guru -> jenis_kelamin = $request -> jenis_kelamin;
        $guru -> agama = $request -> agama;
        $guru -> tempat_lahir = $request -> tempat_lahir;
        $guru -> tanggal_lahir = $request -> tanggal_lahir;

        // upload foto
        $image = $request -> file ('foto');
        $image->storeAs('public/gurus/', $image->hashName());

        // delete produk
        Storage::delete('public/gurus/', $guru->foto);

        $guru->foto=$image->hashName();
        $guru->save();
        return redirect()->route('guru.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru=Guru::findOrFail($id);
        Storage::delete('public/gurus/'. $guru->foto);
        $guru->delete();
        return redirect()->route('guru.index');
    }
}
