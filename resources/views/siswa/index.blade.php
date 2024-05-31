@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            {{ __('siswa') }}
                        </div>
                        <div class="float-end">
                            <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse ($siswa as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
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
                                            <td>{{ $data->kelas->nama_kelas }}</td>
                                            <td>{{ $data->jurusan->nama_jurusan }}</td>
                                            <td>
                                                <img src="{{ asset('/storage/siswas/' . $data->image) }}" class="rounded"
                                                    style="width: 80px">
                                            </td>
                                          <td>
                                        <form action="{{ route('siswa.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('siswa.show', $data->id) }}" class="btn btn-sm btn-outline-dark">Show</a> |
                                            <a href="{{ route('siswa.edit', $data->id) }}" class="btn btn-sm btn-outline-success">Edit</a> |
                                            <button type="submit" onclick="return confirm('Are You Sure ?');"
                                                class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                Data belum tersedia.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
