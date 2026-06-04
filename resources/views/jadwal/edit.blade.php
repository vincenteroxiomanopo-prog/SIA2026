@extends('main.app')
@section('title', '.:Edit Jadwal Kuliah:.')
@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4>Edit Jadwal Kuliah</h4>
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
            <form action="{{ route('jadwal.update', $jadwal->jadwalId) }}" method="POST">
                @csrf
                @method('PUT')    
                <div class="mb-3">
                    {{-- edit hari --}}
                    <label class="form-label">Hari</label>
                    <select name="hari" class="form-select" required>
                        <option value="Senin" {{ $jadwal->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                        <option value="Selasa" {{ $jadwal->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                        <option value="Rabu" {{ $jadwal->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                        <option value="Kamis" {{ $jadwal->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                        <option value="Jumat" {{ $jadwal->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                        <option value="Sabtu" {{ $jadwal->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                    </select>
                </div>
                <div class="mb-3">
                    {{-- edit sesi --}}
                    <label class="form-label">Waktu</label>
                    <select name="waktu" class="form-select" required>
                        <option value="07:30-10:00" {{ $jadwal->waktu == '07:30-10:00' ? 'selected' : '' }}>07:30-10:00</option>
                        <option value="10:30-13:00" {{ $jadwal->waktu == '10:30-13:00' ? 'selected' : '' }}>10:30-13:00</option>
                        <option value="13:30-16:00" {{ $jadwal->waktu == '13:30-16:00' ? 'selected' : '' }}>13:30-16:00</option>
                        <option value="16:30-19:00" {{ $jadwal->waktu == '16:30-19:00' ? 'selected' : '' }}>16:30-19:00</option>
                    </select>
                </div>
                <div class="mb-3">
                    {{-- edit matkul --}}
                    <label class="form-label">Mata Kuliah</label>
                    <select name="kodeMk" class="form-select" required>
                        @foreach($matakuliah as $mk)
                        <option value="{{ $mk->kodeMk }}" {{ $jadwal->kodeMk == $mk->kodeMk ? 'selected' : '' }}>
                            {{ $mk->kodeMk }} - {{ $mk->namaMk }} ({{ $mk->sks }} SKS)
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    {{-- edit grub --}}
                    <label class="form-label">Grup</label>
                    <select name="grup" class="form-select" required>
                        <option value="A" {{ $jadwal->grup == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ $jadwal->grup == 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ $jadwal->grup == 'C' ? 'selected' : '' }}>C</option>
                    </select>
                </div>
                <div class="mb-3">
                    {{-- edit dosen --}}
                    <label class="form-label">Dosen Pengampu</label>
                    <select name="nik" class="form-select" required>
                        @foreach($dosen as $dsn)
                        <option value="{{ $dsn->nik }}" {{ $jadwal->nik == $dsn->nik ? 'selected' : '' }}>
                            {{ $dsn->nik }} - {{ $dsn->namaDosen }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    {{-- edit ruang --}}
                    <label class="form-label">Ruang</label>
                    <input type="text" name="ruang" class="form-control" maxlength="25" value="{{ $jadwal->ruang }}" required>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection