<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'jk' => 'required|in:L,P',
            'prodi' => 'required',
            'tgl_lahir' => 'required|date',
            'nonreg' => 'sometimes|boolean'
        ]);
    
        // Konversi nilai checkbox
        $validatedData['nonreg'] = $request->has('nonreg');
    
        // Simpan ke database
        Mahasiswa::create($validatedData);
    
        // Redirect dengan pesan sukses
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jk' => 'required|in:L,P',
            'prodi' => 'required',
            'tgl_lahir' => 'required|date',
            'nonreg' => 'sometimes|boolean'
        ]);
    
        Mahasiswa::create($request->all());
    
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil diubah');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        try {
            // 1. Hapus data dari database
            $mahasiswa->delete();
            
            // 2. Redirect dengan pesan sukses
            return redirect()->route('mahasiswa.index')
                           ->with('success', 'Data mahasiswa berhasil dihapus');
        } catch (\Exception $e) {
            // 3. Handle error jika terjadi masalah
            return redirect()->route('mahasiswa.index')
                           ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }    }
}
