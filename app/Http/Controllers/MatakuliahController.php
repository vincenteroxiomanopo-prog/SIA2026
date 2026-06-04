<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $data = Matakuliah::all();
        return view('matakuliah.index', compact('data'));
    }
    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kodeMk' => 'required|max:6|unique:matakuliah,kodeMk',
            'namaMk' => 'required',
            'sks'    => 'required|numeric'
        ], [
            'kodeMk.required' => 'Kode MK wajib diisi',
            'kodeMk.max'      => 'Kode MK maksimal 6 karakter',
            'kodeMk.unique'   => 'Kode MK sudah terdaftar, gunakan kode lain',
            'namaMk.required' => 'Nama MK tidak boleh kosong',
            'sks.required'    => 'SKS wajib diisi',
            'sks.numeric'     => 'SKS harus berupa angka'
        ]);

        Matakuliah::create($request->all());

        return redirect()->route('matakuliah.index')
                         ->with('success', 'Data Matakuliah berhasil disimpan');
    }
    public function edit($id)
    {
        $mk = Matakuliah::findOrFail($id);
        return view('matakuliah.edit', compact('mk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kodeMk' => 'required|max:6',
            'namaMk' => 'required',
            'sks'    => 'required|numeric'
        ], [
            'kodeMk.required' => 'Kode MK wajib diisi',
            'kodeMk.max'      => 'Kode MK maksimal 6 karakter',
            'namaMk.required' => 'Nama MK tidak boleh kosong',
            'sks.required'    => 'SKS wajib diisi',
            'sks.numeric'     => 'SKS harus berupa angka'
        ]);

        $mk = Matakuliah::findOrFail($id);
        $mk->update($request->all());

        return redirect()->route('matakuliah.index')
                         ->with('success', 'Data Matakuliah berhasil diupdate');
    }

    public function destroy($id)
    {
        Matakuliah::destroy($id);   
        return redirect()->route('matakuliah.index')
                         ->with('success', 'Data Matakuliah berhasil dihapus');
    }

    public function show($id)
    {
        return Matakuliah::findOrFail($id);
    }
}
