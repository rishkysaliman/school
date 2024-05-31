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
                        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- nama --}}
                            <div class="mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') }}" placeholder="Nama Siswa" required>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- jenis_kelamin --}}
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label><br>
                                <div>
                                    <input type="radio" id="laki" name="jenis_kelamin"
                                        class="@error('jenis_kelamin') is-invalid @enderror" value="0"
                                        {{ old('jenis_kelamin') == '0' ? 'checked' : '' }}>
                                    <label for="laki">Laki-laki</label>
                                </div>
                                <div>
                                    <input type="radio" id="perempuan" name="jenis_kelamin"
                                        class="@error('jenis_kelamin') is-invalid @enderror" value="1"
                                        {{ old('jenis_kelamin') == '1' ? 'checked' : '' }}>
                                    <label for="perempuan">Perempuan</label>
                                </div>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            {{-- agama --}}
                            <div class="mb-3">
                                <label class="form-label">Agama</label>
                                <input type="text" class="form-control @error('agama') is-invalid @enderror"
                                    name="agama" value="{{ old('agama') }}" placeholder="Agama" required>
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- tanggal_lahir --}}
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Tanggal lahir"
                                    required>
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- tempat --}}
                            <div class="mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Tempat lahir"
                                    required>
                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- kelas --}}
                            <div class="mb-3">
                                <label for="">Kelas</label>
                                <select name="id_kelas" id="" class="form-control">
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- jurusan --}}
                            <div class="mb-3">
                                <label for="">Jurusan</label>
                                <select name="id_jurusan" id="" class="form-control">
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Image --}}
                              <div class="mb-3">
                            <label class="form-label">image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                value="{{ old('image') }}" required></input>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-sm btn-warning">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
