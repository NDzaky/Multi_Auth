<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PegawaiController extends Controller
{
    public function index(): View
    {
        $pegawais = Pegawai::with('company', 'devisis')->latest()->paginate(5);
        return view('pegawai.index', compact('pegawais'));
    }

    public function create(): View
    {
        $companies = Company::all();
        return view('pegawai.create', compact('companies'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'company_id' => 'nullable|exists:companies,id',
            'email' => 'required|email',
            'nomor' => 'required|string|max:20',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.show', compact('pegawai'));
    }

    public function edit(string $id): View
    {
        $pegawai = Pegawai::findOrFail($id);
        $companies = Company::all();
        return view('pegawai.edit', compact('pegawai', 'companies'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'company_id' => 'nullable|exists:companies,id',
            'email' => 'required|email',
            'nomor' => 'required|string|max:20',
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(string $id): RedirectResponse
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
