<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistik;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function index()
    {
        $ringkasan = Statistik::where('kategori', 'ringkasan')->orderBy('urutan')->get();
        $penduduk = Statistik::where('kategori', 'penduduk')->orderBy('urutan')->get();
        $pendidikan = Statistik::where('kategori', 'pendidikan')->orderBy('urutan')->get();
        $pekerjaan = Statistik::where('kategori', 'pekerjaan')->orderBy('urutan')->get();
        $umkm = Statistik::where('kategori', 'umkm')->orderBy('urutan')->get();

        return view('admin.statistik.index', compact('ringkasan', 'penduduk', 'pendidikan', 'pekerjaan', 'umkm'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|string',
            'label' => 'required|string|max:255',
            'nilai' => 'required|string|max:255',
            'sub_label' => 'nullable|string|max:255',
            'persentase' => 'nullable|integer|min:0|max:100',
            'icon' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer',
        ]);

        Statistik::create($validated);

        return redirect()->route('admin.statistik.index')->with('success', 'Data statistik berhasil ditambahkan!');
    }

    public function update(Request $request, Statistik $statistik)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'nilai' => 'required|string|max:255',
            'sub_label' => 'nullable|string|max:255',
            'persentase' => 'nullable|integer|min:0|max:100',
            'icon' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer',
        ]);

        $statistik->update($validated);

        return redirect()->route('admin.statistik.index')->with('success', 'Data statistik berhasil diperbarui!');
    }

    public function destroy(Statistik $statistik)
    {
        $statistik->delete();
        return redirect()->route('admin.statistik.index')->with('success', 'Data statistik berhasil dihapus!');
    }
}
