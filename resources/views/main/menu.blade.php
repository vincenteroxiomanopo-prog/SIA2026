<div class="d-flex align-items-start">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        {{-- tampilan pada dosen --}}
        @if (auth()->user()->role == 'dosen')
        <a class="nav-link {{ request()->Is('Dashboard') ? 'active' : '' }}" href="/dashboard">Home</a>
        <a class="nav-link {{ request()->routeIs('mahasiswa.index') ? 'active' : '' }}" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
        <a class="nav-link {{ request()->routeIs('dosen.index') ? 'active' : '' }}" href="{{ route('dosen.index') }}">Dosen</a>
        <a class="nav-link {{ request()->routeIs('matakuliah.index') ? 'active' : '' }}" href="{{ route('matakuliah.index') }}">Matakuliah</a>
        <a class="nav-link {{ request()->routeIs('jadwal.index') ? 'active' : '' }}" href="{{ route('jadwal.index') }}">Jadwal</a>
        <a class="nav-link {{ request()->routeIs('registrasi.index') ? 'active' : '' }}" href="{{ route('registrasi.index') }}">Registrasi</a>
        @endif

        {{-- tampilan pada mahasiswa --}}
        @if (auth()->user()->role == 'mahasiswa')
        {{-- <a class="nav-link {{ request()->Is('Dashboard') ? 'active' : '' }}" href="/dashboard">Home</a>
        <a class="nav-link {{ request()->routeIs('mahasiswa.index') ? 'active' : '' }}" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
        <a class="nav-link {{ request()->routeIs('dosen.index') ? 'active' : '' }}" href="{{ route('dosen.index') }}">Dosen</a>
        <a class="nav-link {{ request()->routeIs('matakuliah.index') ? 'active' : '' }}" href="{{ route('matakuliah.index') }}">Matakuliah</a>
        <a class="nav-link {{ request()->routeIs('jadwal.index') ? 'active' : '' }}" href="{{ route('jadwal.index') }}">Jadwal</a> --}}
        <a class="nav-link {{ request()->routeIs('registrasi.index') ? 'active' : '' }}" href="{{ route('registrasi.index') }}">Registrasi</a>

        @endif
    </div>
</div>  