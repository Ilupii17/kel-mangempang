<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('tanggal', 'desc')->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'konten' => 'required|string',
            'gambar_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'gambar_url' => 'nullable|string|url',
            'penulis' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'is_published' => 'nullable|boolean',
        ]);

        $gambarPath = $request->gambar_url;

        if ($request->hasFile('gambar_file')) {
            $path = $request->file('gambar_file')->store('berita', 'public');
            $gambarPath = asset('storage/' . $path);
        }

        Berita::create([
            'judul' => $validated['judul'],
            'slug' => Str::slug($validated['judul']) . '-' . time(),
            'ringkasan' => $validated['ringkasan'],
            'konten' => $validated['konten'],
            'gambar' => $gambarPath,
            'penulis' => $validated['penulis'] ?? 'Admin Kelurahan',
            'tanggal' => $validated['tanggal'],
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'konten' => 'required|string',
            'gambar_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'gambar_url' => 'nullable|string|url',
            'penulis' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'is_published' => 'nullable|boolean',
        ]);

        $gambarPath = $berita->gambar;

        if ($request->filled('gambar_url')) {
            $gambarPath = $request->gambar_url;
        }

        if ($request->hasFile('gambar_file')) {
            $path = $request->file('gambar_file')->store('berita', 'public');
            $gambarPath = asset('storage/' . $path);
        }

        $berita->update([
            'judul' => $validated['judul'],
            'ringkasan' => $validated['ringkasan'],
            'konten' => $validated['konten'],
            'gambar' => $gambarPath,
            'penulis' => $validated['penulis'] ?? 'Admin Kelurahan',
            'tanggal' => $validated['tanggal'],
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
