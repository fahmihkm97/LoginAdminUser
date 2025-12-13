<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Routing\Controller;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswas.index', compact('mahasiswas'))->with('title', 'Daftar Mahasiswa');
    }

    public function create()
    {
        return view('mahasiswas.create', ['title' => 'Tambah Mahasiswa']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|unique:mahasiswas|max:20',
            'fakultas' => 'required|string|max:255',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswas.index')
                        ->with('status', 'Data Mahasiswa berhasil ditambahkan!');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswas.show', compact('mahasiswa'))->with('title', 'Detail Mahasiswa');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswas.edit', compact('mahasiswa'))->with('title', 'Edit Mahasiswa');
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $mahasiswa->id, 
            'fakultas' => 'required|string|max:255',
        ]);
        
        $mahasiswa->update($validated);

        return redirect()->route('mahasiswas.index')
                        ->with('status', 'Data Mahasiswa berhasil diperbarui!');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswas.index')
                        ->with('status', 'Data Mahasiswa berhasil dihapus!');
    }
}