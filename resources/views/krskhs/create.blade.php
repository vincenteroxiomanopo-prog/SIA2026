@extends('main.app')
@section('title', '.:Create KRSKHS:.')
@section('content')

    {{-- <div class="mt-4">
        <div class="card"> --}}
            <div class="card-header">
                <h4 class="m-0">Daftar Kelas Yang Ditawarkan</h4>
            </div>
            <div class="card-body">
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jadwal as $j)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $j->hari }}</td>
                                <td class="text-center">{{ $j->waktu }}</td>
                                <td>{{ $j->matakuliah->namaMk }}</td>
                                <td class="text-center">{{ $j->matakuliah->sks }}</td>
                                <td class="text-center">{{ $j->grup }}</td>
                                <td>{{ $j->dosen->namaDosen }}</td>
                                <td>{{ $j->ruang }}</td>
                                <td class="text-center">
                                    <form action="{{ route('krskhs.store') }}" method="POST" class="d-inline">
                                        <input type="hidden" name="jadwalId" value="{{ $j->jadwalId }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="bi bi-plus-circle"></i> &nbsp; Pilih
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">
                                    Belum ada data jadwal.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        {{-- </div>
    </div> --}}

@endsection