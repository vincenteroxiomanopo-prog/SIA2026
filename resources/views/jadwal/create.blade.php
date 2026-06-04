@extends('main.app')
@section('title', '.:Tambah Jadwal Kuliah:.')
@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Form Tambah Jadwal Kuliah</h4>
        </div>
        <div class="card-body">
            {{--Validasi Error--}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('jadwal.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    {{-- Pilih hari --}}
                    <label class="form-label">Hari</label>
                    <select name="hari" class="form-select" required>
                        <option value="">-- Pilih Hari --</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    {{-- pilih sesi --}}
                    <label class="form-label">Waktu Kuliah</label>
                    <select name="waktu" class="form-select" required>
                        <option value="07:30-10:00">07:30-10:00</option>
                        <option value="10:30-13:00">10:30-13:00</option>
                        <option value="13:30-16:00">13:30-16:00</option>
                        <option value="16:30-19:00">16:30-19:00</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    {{-- pilih matkul --}}
                    <label class="form-label">Mata Kuliah</label>
                    <select name="kodeMk" class="form-select" required>
                        <option value="">-- Pilih Mata Kuliah --</option>
                        @foreach($matakuliah as $mk)
                        <option value="{{ $mk->kodeMk }}">
                            {{ $mk->kodeMk }} - {{ $mk->namaMk }} ({{ $mk->sks }} SKS)
                        </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    {{-- pilih grub --}}
                    <label class="form-label">Grup</label>
                    <select name="grup" class="form-select" required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                    <div class="form-text text-danger">
                        Prioritaskan membuat Grup A terlebih dahulu.
                    </div>
                </div>
                
                <div class="mb-3">
                    {{-- pilih dosen --}}
                    <label class="form-label">Dosen Pengampu</label>
                    <select name="nik" class="form-select" required>
                        <option value="">-- Pilih Dosen --</option>
                        @foreach($dosen as $dsn)
                        <option value="{{ $dsn->nik }}">
                            {{ $dsn->nik }} - {{ $dsn->namaDosen }}
                        </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    {{-- pilih ruang --}}
                    <label class="form-label">Ruang Kuliah</label>
                    <input type="text" name="ruang" class="form-control" maxlength="25" placeholder="Contoh : Lab Kom 1" required>
                </div>
                
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        Simpan Jadwal
                    </button>
                    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection