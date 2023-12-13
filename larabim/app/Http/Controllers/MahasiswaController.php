<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->paginate();
        return view('pages.mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Berhasil menambahkan data mahasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswas = Mahasiswa::findOrFail($id);
        return view('pages.mahasiswa.show', compact('mahasiswas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mhs = Mahasiswa::findOrfail($id);
        return view('pages.mahasiswa.edit', compact('mhs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->update($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'berhasil update data mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswas = Mahasiswa::findOrFail($id);
        $mahasiswas->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil di hapus');
    }
}
