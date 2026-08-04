<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(12);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'gambar_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'gambar_url' => 'nullable|string|url',
            'keterangan' => 'nullable|string',
        ]);

        $gambarPath = $request->gambar_url;

        if ($request->hasFile('gambar_file')) {
            $path = $request->file('gambar_file')->store('galeri', 'public');
            $gambarPath = asset('storage/' . $path);
        }

        if (!$gambarPath) {
            return back()->withErrors(['gambar_file' => 'Harap sertakan file gambar atau URL gambar.']);
        }

        Galeri::create([
            'judul' => $validated['judul'],
            'kategori' => $validated['kategori'],
            'gambar' => $gambarPath,
            'keterangan' => $validated['keterangan'] ?? null,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil ditambahkan!');
    }

    public function destroy(Galeri $galeri)
    {
        $galeri->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil dihapus!');
    }
}
