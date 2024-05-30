@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('mapel') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('mapel.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('mapel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Mapel</label>
                            <input type="text" class="form-control @error('mapel') is-invalid @enderror"
                            name="mapel" value="{{ old('mapel') }}" placeholder="mapel" required>
                            @error('mapel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kode Mapel</label>
                            <input type="text" class="form-control @error('kode_mapel') is-invalid @enderror" name="kode_mapel"
                                value="{{ old('kode_mapel') }}" placeholder="kode Mapel" required>
                            @error('kode_mapel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="">Guru Pengajar</label>
                                <select name="id_guru" id="" class="form-control">
                                    @foreach ($guru as $item)
                                        <option value="{{$item->id}}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
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
