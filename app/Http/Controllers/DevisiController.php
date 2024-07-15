<?php

namespace App\Http\Controllers;

use App\Models\Devisi;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DevisiController extends Controller
{
    public function index(): View
    {
        $devisis = Devisi::with('anggota')->paginate(5);
        return view('devisi.index', compact('devisis'));
    }

    public function create(): View
    {
        $pegawais = Pegawai::all();
        return view('devisi.create', compact('pegawais'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_devisi' => 'required',
            'anggota_id' => 'nullable|exists:pegawais,id',
        ]);

        Devisi::create([
            'nama_devisi' => $request->nama_devisi,
            'anggota_id' => $request->anggota_id,
        ]);

        return redirect()->route('devisi.index')->with(['success' => 'Devisi Berhasil Dibuat!']);
    }
    public function show(int $id): View
    {
        $devisi = Devisi::with('anggota')->findOrFail($id);
        return view('devisi.show', compact('devisi'));
    }

    public function edit(int $id): View
    {
        $devisi = Devisi::findOrFail($id);
        $pegawais = Pegawai::all();
        return view('devisi.edit', compact('devisi', 'pegawais'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'nama_devisi' => 'required',
            'anggota_id' => 'nullable|exists:pegawais,id',
        ]);

        $devisi = Devisi::findOrFail($id);
        $devisi->update([
            'nama_devisi' => $request->nama_devisi,
            'anggota_id' => $request->anggota_id,
        ]);

        return redirect()->route('devisi.index')->with(['success' => 'Devisi Berhasil Diubah!']);
    }

    public function destroy(int $id): RedirectResponse
    {
        $devisi = Devisi::findOrFail($id);
        $devisi->delete();

        return redirect()->route('devisi.index')->with(['success' => 'Devisi Berhasil Dihapus!']);
    }
}
