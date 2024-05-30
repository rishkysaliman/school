@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('kelas') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('kelas.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">kelas</label>
                            <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas"
                                value="{{ $kelas->kelas }}" placeholder="kelas" required>
                            @error('kelas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Wali Kelas</label>
                            <select name="wali_kelas" id="" class="form-control">
                                @foreach ($guru as $item)
                                    <option value="{{$item->id}}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
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
