@extends('main.app')
@section('title', '.:Matakuliah Create:.')
@section('content')
    <div class="container mt-4">
        <h2>Tambah Matakuliah</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('matakuliah.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Kode MK</label>
                <input type="text" name="kodeMk" value="{{ old('kodeMk') }}" class="form-control">
                @error('kodeMk')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Nama MK</label>
                <input type="text" name="namaMk" value="{{ old('namaMk') }}" class="form-control">
                @error('namaMk')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>SKS</label>
                <input type="number" name="sks" value="{{ old('sks') }}" class="form-control">
                @error('sks')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

@endsection