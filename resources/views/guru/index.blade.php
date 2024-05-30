@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-conten-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            {{ __('guru') }}
                        </div>
                        <div class="float-end">
                            <a href="{{ route('guru.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsiv">
                            <table id="dataTable" class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>nip</td>
                                        <td>Nama Guru</td>
                                        <td>jenis Kelamin</td>
                                        <td>Agama</td>
                                        <td>Tempat Lahir</td>
                                        <td>Tanggal Lahir</td>
                                        <td>Foto</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse ($guru as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nip }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>
                                                @if ($data->jenis_kelamin === 0)
                                                    Laki-laki
                                                @else
                                                    Perempuan
                                                @endif
                                            </td>
                                            <td>{{ $data->agama }}</td>
                                            <td>{{ $data->tempat_lahir }}</td>
                                            <td>{{ $data->tanggal_lahir }}</td>
                                            <td>
                                                <img src="{{ asset('/storage/gurus/' . $data->foto) }}" class="rounded"
                                                    style="width: 150px">
                                            </td>
                                            <td>
                                                <form action="{{ route('guru.destroy', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('guru.show', $data->id) }}"
                                                        class="btn btn-sm btn-outline-dark">Show</a> |
                                                    <a href="{{ route('guru.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-success">Edit</a> |
                                                    <button type="submit" onclick="return confirm('Are You Sure ?');"
                                                        class="btn btn-sm btn-outline-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                Data Data Belum Tersedia.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {!! $guru->withQueryString()->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
