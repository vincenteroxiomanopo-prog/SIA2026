<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
     public function index()
    {
        $data = \App\Models\Mahasiswa::all();
        return view('mahasiswa.index', compact('data'));

    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
                'nim' => 'required|numeric|digits:8',
                'nama' => 'required'
            ], [
                'nim.required' => 'NIM wajib diisi',
                'nim.numeric' => 'NIM harus berupa angka',
                'nim.digits' => 'NIM harus 8 digit',
                'nama.required' => 'Nama tidak boleh kosong'
            ]);

            Mahasiswa::create($request->all());

            return redirect()->route('mahasiswa.index')
                            ->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mhs'));
    }

    public function show($id)
    {
        return Mahasiswa::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|numeric|digits:8',
            'nama' => 'required'
        ], [
            'nim.required' => 'NIM wajib diisi',
            'nim.numeric' => 'NIM harus berupa angka',
            'nim.digits' => 'NIM harus 8 digit',
            'nama.required' => 'Nama tidak boleh kosong'
        ]);

        $mhs = Mahasiswa::findOrFail($id);
        $mhs->update($request->all());

        return redirect()->route('mahasiswa.index')
                        ->with('success', 'Data berhasil diupdate');
    }


    public function destroy($id)
    {
        Mahasiswa::destroy($id);

        return redirect()->route('mahasiswa.index')
                        ->with('success', 'Data berhasil dihapus');
    }

}
