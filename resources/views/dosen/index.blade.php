@extends('main.app')
@section('title', '.:Dosen Index:.')
@section('content')

<div class="mt-4">
    <h2>Data Dosen</h2>

    <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-3">
        + Tambah Mahasiswa
    </a>

    <table class="table table-bordered">
        <thead>
            <tr><th>NIK</th><th>Nama</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @foreach($data as $dsn)
            <tr><td>{{ $dsn->nik }}</td><td>{{ $dsn->namaDosen }}</td>
                <td>
                    <a href="{{ route('dosen.edit', $dsn->nik) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('dosen.destroy', $dsn->nik) }}" method="POST" style="display:inline;">
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