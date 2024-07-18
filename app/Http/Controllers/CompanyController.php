<?php
// Namespace
namespace App\Http\Controllers;
// Import Model
use App\Models\Company;
// Import Return Type View
use Illuminate\View\View;
// Import Return Type RedirectResponse
use Illuminate\Http\RedirectResponse;
// Import Http Request
use Illuminate\Http\Request;
// Import Facades Storage
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * index
     *
     * Menampilkan data company dengan pagination sebanyak 5 data per halaman.
     *
     * @return View
     */
    public function index(): View
    {
        // Ambil data company dengan urutan terbaru
        $companies = Company::latest()->paginate(5);
        // Render view companies.index dengan data companies
        return view('companies.index', compact('companies'));
    }

    /**
     * create
     *
     * Menampilkan form untuk membuat data company baru.
     *
     * @return View
     */
    public function create(): View
    {
        // Render view companies.create
        return view('companies.create');
    }

    /**
     * store
     *
     * Menyimpan data company baru yang dikirim melalui form.
     *
     * @param  Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'logo'    => 'required|image|mimes:jpeg,jpg,png|max:12000|dimensions:max_width=500,max_height=500',
            'nama'    => 'required',
            'email'   => 'required|email',
            'website' => 'required|',
        ]);

        // Upload gambar
        $image = $request->file('logo');
        $image->storeAs('public/img', $image->hashName());

        // Simpan data company baru ke database
        Company::create([
            'logo'    => $image->hashName(),
            'nama'    => $request->nama,
            'email'   => $request->email,
            'website' => $request->website,
        ]);

        // Redirect ke halaman index dengan pesan berhasil
        return redirect()->route('companies.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * Menampilkan detail data company berdasarkan ID.
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        // Ambil data company berdasarkan ID
        $company = Company::findOrFail($id);

        // Render view companies.show dengan data company
        return view('companies.show', compact('company'));
    }

    /**
     * edit
     *
     * Menampilkan form untuk mengubah data company berdasarkan ID.
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        // Ambil data company berdasarkan ID
        $company = Company::findOrFail($id);

        // Render view companies.edit dengan data company
        return view('companies.edit', compact('company'));
    }
        
    /**
     * update
     *
     * Mengubah data company yang dikirim melalui form.
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'logo'         => 'image|mimes:jpeg,jpg,png|max:12000',
            'nama'         => 'required',
            'email'   => 'required|email',
            'website'         => 'required|',
        ]);

        // Ambil data company berdasarkan ID
        $company = Company::findOrFail($id);

        // Cek apakah gambar baru diupload
        if ($request->hasFile('logo')) {

            // Upload gambar baru
            $image = $request->file('logo');
            $image->storeAs('public/img', $image->hashName());

            // Hapus gambar lama
            Storage::delete('public/img/'.$company->logo);

            // Update data company dengan gambar baru
            $company->update([
                'logo'         => $image->hashName(),
                'nama'         => $request->nama,
                'email'   => $request->email,
                'website'         => $request->website,
            ]);

        } else {

            // Update data company tanpa gambar
            $company->update([
                'nama'         => $request->nama,
                'email'   => $request->email,
                'website'         => $request->website,
            ]);
        }
        

        // Redirect ke halaman index dengan pesan berhasil
        return redirect()->route('companies.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * Menghapus data company berdasarkan ID.
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        // Ambil data company berdasarkan ID
        $company = Company::findOrFail($id);
        // Hapus gambar dari storage
        Storage::delete('public/img/' . $company->logo);
        // Hapus data company
        $company->delete();
        // Redirect ke halaman index dengan pesan berhasil
        return redirect()->route('companies.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}