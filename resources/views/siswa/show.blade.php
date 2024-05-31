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
                            <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-content">
                            <img src="{{ asset('storage/siswas/' . $siswa->image) }}" class="w-50 rounded"
                                style="display: block;
                            margin-left: auto;
                            margin-right: auto;">
                            <hr>
                            <h4>{{ $siswa->nama_siswa }}</h4>
                            <p class="mt-3">
                                @if ($siswa->jneis_kelamin === 0)
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                            </p>
                            <hr>
                            <p class="mt-3">
                                {{ $siswa->agama }}
                            </p>
                            <hr>
                            <p class="mt-3">
                                {{ $siswa->tempat_lahir }}
                            </p>
                            <hr>
                            <p class="mt-3">
                                {{ $siswa->tanggal_lahir }}
                            </p>
                            <hr>
                            <p class="mt-3">
                                {{ $siswa->kelas->nama_kelas }}
                            </p>
                            <hr>
                            <p class="mt-3">
                                {{ $siswa->jurusan->nama_jurusan }}
                            </p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
