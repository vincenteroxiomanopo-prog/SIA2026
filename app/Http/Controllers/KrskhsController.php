<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use App\Models\Krskhs;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class KrskhsController extends Controller
{
    public function index()
    {
        return Krskhs::with(['registrasi.mahasiswa','jadwal.matakuliah','jadwal.dosen'])->get();
    }
    public function create()
    {    
        $jadwal = Jadwal::with(['dosen','matakuliah'])->get();
        return view('krskhs.create',compact('jadwal'));
    }

    // public function store(Request $request)
    // {
    //     return Krskhs::create($request->all());
    // }

    public function store(Request $request)
    {
        // 1. Validasi input memastikan jadwalId benar-benar dikirim
        $request->validate([
            'jadwalId' => 'required'
        ]);

        // 2. Ambil noReg dari session
        $noReg = session('noReg');

        // 3. (Opsional tapi Penting) Cek agar mahasiswa tidak mengambil jadwal yang sama 2 kali
        $sudahDiambil = KrsKhs::where('noReg', $noReg)
                                        ->where('jadwalId', $request->jadwalId)
                                        ->first();

        if($sudahDiambil) {
            // Jika sudah ada, kembalikan ke halaman index dengan pesan error
            return redirect()->route('registrasi.index')
                            ->with('error', 'Mata kuliah ini sudah Anda ambil.');
        }

        // 4. Simpan data ke tabel krskhs
        KrsKhs::create([
            'noReg' => $noReg,
            'jadwalId' => $request->jadwalId,
            //'nilai' => null // Nilai dikosongkan terlebih dahulu saat registrasi awal
            'nilai' => '-' // karena tidak bisa null maka di isi strip terlebi dahulu
        ]);

        // 5. Kembalikan ke halaman registrasi index
        return redirect()->route('registrasi.index')
                        ->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function show($id)
    {
        return Krskhs::with(['registrasi','jadwal'])->findOrFail($id);
    }
    

    public function update(Request $request, $id)
    {
        $data = Krskhs::findOrFail($id);
        $data->update($request->all());
        return $data;
    }

    public function destroy($id)
    {
        Krskhs::destroy($id);
        return redirect()->route('registrasi.index')
                        ->with('success', 'Data berhasil dihapus');
    }

    public function pdf()
    {
        // 1. Ambil nomor registrasi dari session dan NIM dari user login
        $noReg = session('noReg');
        $nim = auth()->user()->nim;

        // 2. Jika tidak ada session noReg, kembalikan ke halaman index
        if (!$noReg) {
            return redirect()->route('registrasi.index')->with('error', 'Data registrasi tidak ditemukan.');
        }

        // 3. Ambil data Registrasi dan relasi Mahasiswa
        $registrasi = Registrasi::with('mahasiswa')->where('nim', $nim)->first();

        // 4. Ambil data KRS beserta relasi Jadwal, Matakuliah, dan Dosen
        $krskhs = KrsKhs::with([
            'jadwal.matakuliah',
            'jadwal.dosen'
        ])
        ->where('noReg', $noReg)
        ->get();

        // 5. Load file view 'krskhs.pdf' dan kirimkan datanya
        $pdf = Pdf::loadView('krskhs.pdf', compact('registrasi', 'krskhs'));

        // 6. Tampilkan PDF di browser (stream) atau gunakan download() untuk langsung unduh
        return $pdf->stream('KRS_'.$nim.'.pdf');
    }

    public function pdf1()
    {
        $nim = auth()->user()->nim; //cek yg login 

        $registrasi = Registrasi::with('mahasiswa')->where('nim', $nim)->firstOrFail();//Ambil data Registrasi dan relasi Mahasiswa

        $krskhs = KrsKhs::with([
            'jadwal.matakuliah',
            'jadwal.dosen'
        ])
        ->where('noReg', $registrasi->noReg) // dari no reg
        ->get();  // Ambil data KRS beserta relasi Jadwal, Matakuliah, dan Dosen

        $pdf = Pdf::loadView('krskhs.pdf', compact('registrasi', 'krskhs'));  //Load file view 'krskhs.pdf' dan kirimkan datanya

        return $pdf->stream('KRS_'.$nim.'.pdf');// Tampilkan PDF di browser (stream) atau gunakan download() untuk langsung unduh
    }

}
