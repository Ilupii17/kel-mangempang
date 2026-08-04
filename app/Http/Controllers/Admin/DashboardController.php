<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kontak;
use App\Models\Statistik;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();
        $totalPesan = Kontak::count();
        $pesanBelumDibaca = Kontak::where('is_read', false)->count();

        $recentPesan = Kontak::latest()->take(5)->get();
        $recentBerita = Berita::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalBerita',
            'totalGaleri',
            'totalPesan',
            'pesanBelumDibaca',
            'recentPesan',
            'recentBerita'
        ));
    }
}
