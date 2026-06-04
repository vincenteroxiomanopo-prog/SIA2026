<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        // return Dosen::all();
        $data = \App\Models\Dosen::all();
        return view('dosen.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
                'nik' => 'required|numeric|digits:7',
                'namaDosen' => 'required'
            ], [
                'nik.required' => 'NIK wajib diisi',
                'nik.numeric' => 'NIK harus berupa angka',
                'nik.digits' => 'NIK harus 7 digit',
                'namaDosen.required' => 'Nama tidak boleh kosong'
            ]);

            Dosen::create($request->all());

            return redirect()->route('dosen.index')
                            ->with('success', 'Data berhasil disimpan');
    }
    public function create()
    {
        return view('dosen.create');
    }

    public function show($id)
    {
        return Dosen::findOrFail($id);
    }
    public function edit($id)
    {
        $dsn = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dsn'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|numeric|digits:7',
            'namaDosen' => 'required'
        ], [
            'nik.required' => 'NIK wajib diisi',
            'nik.numeric' => 'NIK harus berupa angka',
            'nik.digits' => 'NIK harus 7 digit',
            'nanamaDosenma.required' => 'Nama tidak boleh kosong'
        ]);

        $dsn = Dosen::findOrFail($id);
        $dsn->update($request->all());

        return redirect()->route('dosen.index')
                        ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Dosen::destroy($id);
        return redirect()->route('dosen.index')
                        ->with('success', 'Data berhasil dihapus');
    }
}
