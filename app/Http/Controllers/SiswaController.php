<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Validator;
use Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $siswa=Siswa::latest()->paginate(5);
        return view('Siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $kelas=Kelas::all();
        $jurusan=Jurusan::all();
        return view('Siswa.create', compact('kelas', 'jurusan'));

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
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $siswa = new Siswa();
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->id_jurusan = $request->id_jurusan;

        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/siswas/', $image->hashName());
        $siswa->image = $image->hashName();
        $siswa->save();

        return redirect()->route('siswa.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas=Kelas::all();
        $jurusan=Jurusan::all();
        $siswa=Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa', 'kelas', 'jurusan'));
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
            'nama'=>'required',
            'jenis_kelamin'=>['required','boolean'],
            'agama'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'id_kelas'=>'required',
            'id_jurusan'=>'required',
            'image'=>'required',
        ]);

        $siswa=Siswa::findOrFail($id);
        $siswa -> nama = $request -> nama;
        $siswa -> jenis_kelamin = $request -> jenis_kelamin;
        $siswa -> agama = $request -> agama;
        $siswa -> tempat_lahir = $request -> tempat_lahir;
        $siswa -> tanggal_lahir = $request -> tanggal_lahir;
        $siswa -> id_kelas = $request -> id_kelas;
        $siswa -> id_jurusan = $request -> id_jurusan;

        // upload foto
        $image = $request -> file ('image');
        $image->storeAs('public/siswas/', $image->hashName());

        // delete produk
        Storage::delete('public/siswas/', $siswa->image);

        $siswa->image=$image->hashName();
        $siswa->save();
        return redirect()->route('siswa.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa=Siswa::findOrFail($id);
        Storage::delete('public/siswas/'. $siswa->foto);
        $siswa->delete();
        return redirect()->route('siswa.index');
    }
}
