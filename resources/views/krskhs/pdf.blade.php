<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak KRS</title>
</head>

<body>
    <center>
        <h3 style="margin: 0; padding-bottom: 5px;">KARTU RENCANA STUDI</h3>
        <p style="margin: 0;">Tahun Akademik {{ now()->subYear()->year }}/{{ now()->year }}</p>
    </center>
    <br>

    <div class="info-mahasiswa">
        <b>No. Reg.</b> : {{ $registrasi->noReg }} <br>
        <b>NIM</b> : {{ $registrasi->nim }} <br>
        <b>Nama</b> : {{ $registrasi->mahasiswa->nama }}
    </div>

    <table border="1" cellspacing="0" cellpadding="5" width="100%" style="margin-top: 15px; border-collapse: collapse;">
        <thead>
            <tr>
                <th>No.</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Grup</th>
                <th>Nama Dosen</th>
                <th>Ruang</th>
            </tr>
        </thead>
        <tbody>
            @forelse($krskhs as $j)
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td>{{ $j->jadwal->hari }}</td>
                    <td align="center">{{ $j->jadwal->waktu }}</td>
                    <td>{{ $j->jadwal->matakuliah->namaMk }}</td>
                    <td align="center">{{ $j->jadwal->matakuliah->sks }}</td>
                    <td align="center">{{ $j->jadwal->grup }}</td>
                    <td>{{ $j->jadwal->dosen->namaDosen }}</td>
                    <td>{{ $j->jadwal->ruang }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" align="center">Belum ada data jadwal.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>