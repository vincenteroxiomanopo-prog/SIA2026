@extends('main.app')
@section('title', '.:Dosen Edit:.')
@section('content')
<div class="container mt-4">
    <h2>Edit Dosen</h2>

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

    <form action="{{ route('dosen.update', $dsn->nik) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" value="{{ old('nik', $dsn->nik) }}" class="form-control" readonly>

            @error('nik')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="namaDosen" value="{{ old('namaDosen', $dsn->namaDosen) }}" class="form-control">

            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection
