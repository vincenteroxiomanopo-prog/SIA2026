@extends('main.app')
@section('title', '.:Data Jadwal Kuliah:.')
@section('content')
<div class="container mt-4">
    <h2>Data Jadwal Kuliah</h2>
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3"> 
        + Tambah Jadwal 
    </a>
    {{-- Notifikasi --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }} 
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button> 
    </div>
    @endif
    {{-- Tabel Jadwal --}}
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th><th>Hari</th><th>Waktu</th><th>Kode MK</th> <th>Nama Mata Kuliah</th> <th>SKS</th><th>Grup</th> 
                <th>NIK</th><th>Nama Dosen</th> <th>Ruang</th><th>Aksi</th>
            </tr>
        </thead> 
        <tbody>
            @foreach($jadwal as $j) 
            <tr> 
                <td>{{ $j->jadwalId }}</td>
                <td>{{ $j->hari }}</td>
                <td>{{ $j->waktu }}</td>
                <td>{{ $j->kodeMk }}</td>
                <td>{{ $j->matakuliah->namaMk }}</td> 
                <td>{{ $j->matakuliah->sks }}</td> 
                <td>{{ $j->grup }}</td> 
                <td>{{ $j->nik }}</td>
                <td>{{ $j->dosen->namaDosen }}</td>
                <td>{{ $j->ruang }}</td>
                <td>
                    {{--Edit --}}
                    <a href="{{ route('jadwal.edit', $j->jadwalId) }}" class="btn btn-warning btn-sm"> Edit </a> 
                    {{-- Form Hapus --}}
                    <form action="{{ route('jadwal.destroy', $j->jadwalId) }}" method="POST" style="display:inline;"> 
                        @csrf 
                        @method('DELETE') 
                        <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">Hapus </button> 
                    </form>
                </td> 
            </tr>
            @endforeach 
        </tbody>
    </table> 
</div>
@endsection