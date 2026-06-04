@extends('main.app')
@section('title', '.:Matakuliah Index:.')
@section('content')
    <div class="mt-4">
        <h2>Data Matakuliah</h2>
        <a href="{{ route('matakuliah.create') }}" class="btn btn-primary mb-3">
            + Tambah Matakuliah
        </a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode MK</th><th>Nama MK</th><th>SKS</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $mk)
                    <tr>
                        <td>{{ $mk->kodeMk }}</td>
                        <td>{{ $mk->namaMk }}</td>
                        <td>{{ $mk->sks }}</td>
                        <td>
                            <a href="{{ route('matakuliah.edit', $mk->kodeMk) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('matakuliah.destroy', $mk->kodeMk) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection