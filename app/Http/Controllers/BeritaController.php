<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Setting;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $query = Berita::where('is_published', true);

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('ringkasan', 'like', "%{$search}%")
                  ->orWhere('konten', 'like', "%{$search}%");
            });
        }

        $beritas = $query->orderBy('tanggal', 'desc')->paginate(6);

        return view('berita.index', compact('beritas', 'settings'));
    }

    public function show($slug)
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $berita = Berita::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $beritaTerkait = Berita::where('is_published', true)
            ->where('id', '!=', $berita->id)
            ->orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        return view('berita.show', compact('berita', 'beritaTerkait', 'settings'));
    }
}
