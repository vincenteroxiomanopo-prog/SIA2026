@extends('main.app')
@section('title', '.:Mahasiswa Index:.')
@section('content')

<div class="mt-4">
    <h2>Data Mahasiswa</h2>

    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">
        + Tambah Mahasiswa
    </a>

    <table class="table table-bordered">
        <thead>
            <tr><th>NIM</th><th>Nama</th><th>Kota</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @foreach($data as $mhs)
            <tr><td>{{ $mhs->nim }}</td><td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->kota }}</td><td>
                    <a href="{{ route('mahasiswa.edit', $mhs->nim) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('mahasiswa.destroy', $mhs->nim) }}" method="POST" style="display:inline;">
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