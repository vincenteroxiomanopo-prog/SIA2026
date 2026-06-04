@extends('main.app')
@section('title', '.:Mahasiswa Edit:.')
@section('content')
<div class="container mt-4">
    <h2>Edit Mahasiswa</h2>

    {{-- ERROR GLOBAL --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.update', $mhs->nim) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="nim" value="{{ old('nim', $mhs->nim) }}" class="form-control" readonly>

            @error('nim')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $mhs->nama) }}" class="form-control">

            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Kota</label>
            <input type="text" name="kota" value="{{ old('kota', $mhs->kota) }}" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection
