@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-conten-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            {{ __('guru') }}
                        </div>
                        <div class="float-end">
                            <a href="{{ route('guru.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('storage/gurus/' . $guru->foto) }}" class="w-100 rounded">
                        <hr>
                        <h4>{{ $guru->nama }}</h4>
                        <p class="tmt-3">
                            {{ $guru->nip }}
                        </p>
                        {{ $guru->agama }}
                        </p>
                        <p class="tmt-3">
                            @if ($guru->jenis_kelamin === 0)
                                Laki-laki
                            @else
                                Perempuan
                            @endif
                        </p>
                        <p class="tmt-3">
                            {{ $guru->tempat_lahir }} , {{ $guru->tanggal_lahir }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
