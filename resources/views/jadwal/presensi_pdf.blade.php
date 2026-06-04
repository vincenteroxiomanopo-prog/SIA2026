<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Hadir Presensi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        /* CSS Header diubah untuk menyesuaikan tata letak tabel DOMPDF */
        .header-table {
            width: 100%;
            margin-bottom: 10px;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
        }

        .header-table td {
            vertical-align: middle;
        }

        .header-logo {
            width: 15%;
            text-align: center;
        }

        .header-logo img {
            width: 80px;
        }

        /* Sesuaikan ukuran logo */
        .header-text {
            width: 85%;
            text-align: center;
        }

        .header-text h1 {
            margin: 0;
            font-size: 20px;
        }

        .header-text h3 {
            margin: 2px 0;
            font-size: 14px;
        }

        .header-text p {
            margin: 5px 0 0 0;
            font-size: 11px;
            font-style: italic;
        }

        h4.title {
            text-align: center;
            margin: 15px 0 5px 0;
            font-size: 14px;
        }

        h4.subtitle {
            text-align: center;
            margin: 0 0 15px 0;
            font-size: 13px;
            font-weight: normal;
        }

        /* Tabel Informasi Jadwal (4 Baris, 4 Kolom) dengan Border */
        .table-info {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .table-info td {
            padding: 6px;
            vertical-align: middle;
            border: 1px solid black;
            /* Tambahan border sesuai permintaan */
        }

        .col-label {
            width: 18%;
            background-color: #f9f9f9;
        }

        /* Tambahan warna latar opsional agar lebih rapi */
        .col-value {
            width: 32%;
        }

        /* Tabel Kehadiran (List Mahasiswa) */
        .table-presensi {
            width: 100%;
            border-collapse: collapse;
        }

        .table-presensi th,
        .table-presensi td {
            border: 1px solid black;
            padding: 6px;
        }

        .table-presensi th {
            background-color: #f2f2f2;
            text-align: center;
            font-size: 11px;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>

    <table class="header-table">
        <tr>
            <td class="header-logo">
                <img src="{{ public_path('images/logo-ukdw.PNG') }}" alt="Logo UKDW">
            </td>
            <td class="header-text">
                <h1>UNIVERSITAS KRISTEN DUTA WACANA</h1>
                <h3>Fakultas Teknologi Informasi</h3>
                <h3>Program Studi Sistem Informasi</h3>
                {{-- Mengambil nama user yang sedang login --}}
                <p>Dicetak oleh: {{ auth()->check() ? auth()->user()->name : 'Sistem' }}</p>
            </td>
        </tr>
    </table>

    <h4 class="title">DAFTAR PRESENSI MAHASISWA</h4>
    <h4 class="subtitle">Tahun Akademik {{ now()->subYear()->year }}/{{ now()->year }}</h4>

    <table class="table-info">
        <tr>
            <td class="col-label">Nama Mata Kuliah</td>
            <td class="col-value">: {{ $jadwal->matakuliah->namaMk ?? '-' }}</td>
            <td class="col-label">SKS</td>
            <td class="col-value">: {{ $jadwal->matakuliah->sks ?? '-' }}</td>
        </tr>
        <tr>
            <td class="col-label">Kode Mata Kuliah</td>
            <td class="col-value">: {{ $jadwal->kodeMk ?? '-' }}</td>
            <td class="col-label">Grup</td>
            <td class="col-value">: {{ $jadwal->grup ?? '-' }}</td>
        </tr>
        <tr>
            <td class="col-label">Hari / Waktu</td>
            <td class="col-value">: {{ $jadwal->hari ?? '-' }} / {{ $jadwal->waktu ?? '-' }}</td>
            <td class="col-label">Ruang</td>
            <td class="col-value">: {{ $jadwal->ruang ?? '-' }}</td>
        </tr>
        <tr>
            <td class="col-label">Dosen Pengampu</td>
            <td class="col-value">: {{ $jadwal->dosen->namaDosen ?? '-' }}</td>
            <td class="col-label"></td>
            <td class="col-value"></td>
        </tr>
    </table>

    <table class="table-presensi">
        <thead>
            <tr>
                <th width="3%">No</th>
                <th width="10%">NIM</th>
                <th width="22%">Nama Mahasiswa</th>

                {{-- Looping langsung untuk kolom Tgl: tanpa header grup di atasnya --}}
                @for ($i = 1; $i <= 14; $i++)
                    <th width="4%">Tgl:</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @forelse($jadwal->krskhs as $index => $krs)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>

                    {{-- Ganti tanda '-' dengan kutip kosong '' --}}
                    <td class="text-center">{{ $krs->registrasi->mahasiswa->nim ?? '' }}</td>
                    <td>{{ $krs->registrasi->mahasiswa->nama ?? '' }}</td>

                    @for ($i = 1; $i <= 14; $i++)
                        <td></td>
                    @endfor
                </tr>
            @empty
                <tr>
                    <td colspan="17" class="text-center">Belum ada mahasiswa yang mengambil mata kuliah ini.</td>
                </tr>
            @endforelsegi
        </tbody>
    </table>

</body>

</html>