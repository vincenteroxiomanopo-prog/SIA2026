<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use Illuminate\Http\Request;
use App\Models\Krskhs;


class RegistrasiController extends Controller
{
    public function index()
    {
        // $registrasi = \App\Models\Registrasi::all();
        // Registrasi::with('mahasiswa')->get();
        // return view('registrasi.index', compact('registrasi'));
        $nim = auth()->user()->nim; //<-- user yang Log In
        $registrasi = Registrasi::where('nim', $nim)
        ->first(); //<-- apa sdh Registrasi
        // Jika belum registrasi, buat baris Registrasi
        if(!$registrasi)
        {
            $registrasi = Registrasi::create([
                'tanggal' => now(),
                'nim' => $nim,
            ]);
        }

        $noReg = $registrasi->noReg; //<-- cacat noReg nya
        session(['noReg' => $noReg]); // <-- Simpan ke session
        $krskhs = KrsKhs::with([ //<-- baca semua data registrasi
            'jadwal.matakuliah',
            'jadwal.dosen'
        ])
        
        ->where('noReg', $noReg) //<-- berdasarkan noReg
        ->get();
        // Kirim ke View untuk ditampilkan
        return view('registrasi.index',compact('registrasi','krskhs'));

    }

    public function store(Request $request)
    {
        return Registrasi::create($request->all());
    }

    public function show($id)
    {
        return Registrasi::with('mahasiswa')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $reg = Registrasi::findOrFail($id);
        $reg->update($request->all());
        return $reg;
    }

    public function destroy($id)
    {
        return Registrasi::destroy($id);
    }
}
