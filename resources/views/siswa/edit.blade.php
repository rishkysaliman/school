@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('siswa') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama siswa</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                value="{{ $siswa->nama }}" placeholder="Nama Siswa" required>
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            {{-- <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                            value="{{ old('jenis_kelamin') }}" placeholder="" required> --}}
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                                value="0" checked>
                                <label class="form-check-label" for="jenis_kelamin">
                                  Laki-Laki
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                                value="1" >
                                <label class="form-check-label" for="jenis_kelamin">
                                  Perempuan
                                </label>
                              </div>
                            @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <textarea class="form-control" class="form-control @error('agama') is-invalid @enderror"
                                name="agama" rows="3" placeholder="Agama"
                                required>{{ $siswa->agama }}</textarea>
                            @error('agama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                                value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir" required>
                            @error('tempat_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}" placeholder="Tanggal Lahir" required>
                            @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="">Kelas</label>
                                <select name="id_kelas" id="" class="form-control">
                                    @foreach ($kelas as $item)
                                        <option value="{{$item->id}}">{{ $item->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="">Jurusan</label>
                                <select name="id_jurusan" id="" class="form-control">
                                    @foreach ($jurusan as $item)
                                        <option value="{{$item->id}}">{{ $item->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">foto</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                value="{{ $siswa->image }}"></input>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-sm btn-warning">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
