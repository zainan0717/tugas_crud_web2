<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kodebuku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'foto_cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('foto_cover')) {
            $data['foto_cover'] = $request->file('foto_cover')->store('buku', 'public');
        }

        Buku::create($data);
        return redirect()->route('buku.index')->with('success', 'Buku created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'kodebuku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'foto_cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('foto_cover')) {
            if ($buku->foto_cover) {
                Storage::disk('public')->delete($buku->foto_cover);
            }
            $data['foto_cover'] = $request->file('foto_cover')->store('buku', 'public');
        }

        $buku->update($data);
        return redirect()->route('buku.index')->with('success', 'Buku updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        if ($buku->foto_cover) {
            Storage::disk('public')->delete($buku->foto_cover);
        }
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku deleted successfully.');
    }
}
