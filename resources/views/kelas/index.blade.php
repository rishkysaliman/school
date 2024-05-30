@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-conten-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('kelas') }}
                    </div>
                 <div class="float-end">
                            <a href="{{ route('kelas.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                        </div>
                </div>
                <div class="card-body">
                    <div class="table-responsiv">
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Kelas</td>
                                    <td>Nama Wali Kelas</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ( $kelas as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->kelas }}</td>
                                    <td>{{ $data->guru}}</td>
                                    <td>
                                        <form action="{{ route('kelas.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('kelas.edit', $data->id) }}" class="btn btn-sm btn-outline-success">Edit</a> |
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
                        {!! $kelas->withQueryString()->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
