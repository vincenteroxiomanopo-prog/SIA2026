<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Models\Matakuliah;
use App\Models\Dosen;
use App\Models\Mahasiswa;


class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['dosen', 'matakuliah'])->get();
        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $matakuliah = Matakuliah::orderBy('namaMk')->get();
        $dosen = Dosen::orderBy('namaDosen')->get();

        return view('jadwal.create', [
            'matakuliah' => $matakuliah,
            'dosen' => $dosen
        ]);        
    }
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|max:6',
            'waktu' => 'required',
            'kodeMk' => 'required|exists:matakuliah,kodeMk',
            'grup' => 'required|max:1',
            'nik' => 'required|exists:dosen,nik',
            'ruang' => 'required|max:25',
        ]);
        Jadwal::create([
            'hari' => $request->hari,
            'waktu' => $request->waktu,
            'kodeMk' => $request->kodeMk,
            'grup' => $request->grup,
            'nik' => $request->nik,
            'ruang' => $request->ruang,
        ]);
        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Data jadwal berhasil disimpan.');

        
    }
    public function show($id)
    {
        return Jadwal::with(['dosen','matakuliah'])->findOrFail($id);
    }
    public function edit($jadwalId)
    {
        $jadwal = Jadwal::findOrFail($jadwalId);
        $matakuliah = Matakuliah::orderBy('namaMk')->get();
        $dosen = Dosen::orderBy('namaDosen')->get();
        return view('jadwal.edit', compact('jadwal','matakuliah','dosen'));
    }

    public function update(Request $request, $jadwalId)
    {  
        $request->validate([
            'hari' => 'required|max:6',
            'waktu' => 'required',
            'kodeMk' => 'required|exists:matakuliah,kodeMk',
            'grup' => 'required|max:1',
            'nik' => 'required|exists:dosen,nik',
            'ruang' => 'required|max:25',
        ]);
        $jadwal = Jadwal::findOrFail($jadwalId);
        $jadwal->update([
            'hari' => $request->hari,
            'waktu' => $request->waktu,
            'kodeMk' => $request->kodeMk,
            'grup' => $request->grup,
            'nik' => $request->nik,
            'ruang' => $request->ruang,
        ]);
        return redirect()
        ->route('jadwal.index')
        ->with('success', 'Data jadwal berhasil diupdate.');
    }

    public function destroy($jadwalId)
    {
        $jadwal = Jadwal::findOrFail($jadwalId);
        $jadwal->delete();
        return redirect()->route('jadwal.index')
                        ->with('success', 'Data jadwal berhasil dihapus.');
    }
    
}
