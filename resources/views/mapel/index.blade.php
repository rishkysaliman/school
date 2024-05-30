@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-conten-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            {{ __('mapel') }}
                        </div>
                        <div class="float-end">
                            <a href="{{ route('mapel.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsiv">
                            <table id="dataTable" class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Mapel</td>
                                        <td>Kode Mapel</td>
                                        <td>Guru Pengajar</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse ($mapel as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->mapel }}</td>
                                            <td>{{ $data->kode_mapel }}</td>
                                            <td>{{ $data->guru->nama }}</td>
                                            <td>
                                                <form action="{{ route('mapel.destroy', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('mapel.edit', $data->id) }}"
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
                            {!! $mapel->withQueryString()->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
