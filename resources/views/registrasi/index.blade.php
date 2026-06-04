@extends('main.app')
@section('title', '.:Registrasi:.')
@section('content')

        {{-- <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Simulasi Registrasi Mahasiswa</span>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">
                        Logout
                    </button>
                </form>
            </div> --}}
            
            {{-- <div class="card-body"> --}}
                <div class="text-left mb-4">
                    <h2>Simulasi Registrasi Mahasiswa</h2>
                    <h4>Program Studi Sistem Informasi Fakultas Teknologi Informasi</h4>
                    <h5>Universitas Kristen Duta Wacana Yogyakarta</h5>
                </div>
                <hr>

                <div class="mb-3">
                    Welcome, {{ auth()->user()->name }}! <br>
                    <strong>No. Reg:</strong> {{ $registrasi->noReg }} <br>
                    <strong>NIM:</strong> {{ $registrasi->nim }} <br>
                    <strong>Nama Mahasiswa:</strong> {{ $registrasi->mahasiswa->nama }} <br>
                </div>

                <div class="mb-3">
                    <a href="{{ route('krskhs.create') }}" class="btn btn-primary btn-sm">
                        Tambah Jadwal
                    </a>
                    <a href="{{ route('krskhs.pdf') }}" target="_blank" class="btn btn-success btn-sm">
                        Print KRS
                    </a>
                </div>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Grup</th>
                            <th>Nama Dosen</th>
                            <th>Ruang</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($krskhs as $j)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $j->jadwal->hari }}</td>
                                <td align="center">{{ $j->jadwal->waktu }}</td>
                                <td>{{ $j->jadwal->matakuliah->namaMk }}</td>
                                <td class="text-center">{{ $j->jadwal->matakuliah->sks }}</td>
                                <td class="text-center">{{ $j->jadwal->grup }}</td>
                                <td>{{ $j->jadwal->dosen->namaDosen }}</td>
                                <td>{{ $j->jadwal->ruang }}</td>
                                <td>{{ $j->nilai }}</td>

                                <td class="text-center">
                                    <form action="{{ route('krskhs.destroy', $j->idKrs) }}" id="delete-form-{{$j->idKrs}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Belum ada data jadwal.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            {{-- </div>
        </div> --}}

@endsection