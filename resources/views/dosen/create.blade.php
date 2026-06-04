@extends('main.app')
@section('title', '.:Dosen Create:.')
@section('content')
<div class="container mt-4">
    <h2>Tambah Dosen</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dosen.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" value="{{ old('nik') }}" class="form-control">
            @error('nik')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="namaDosen" value="{{ old('namaDosen') }}" class="form-control">
            @error('namaDosen')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection