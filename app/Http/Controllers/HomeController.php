<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Statistik;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        // Misi list parsed from JSON if set
        $misiList = isset($settings['misi']) ? json_decode($settings['misi'], true) : [];

        $ringkasanStats = Statistik::where('kategori', 'ringkasan')->orderBy('urutan')->get();
        $dataPenduduk = Statistik::where('kategori', 'penduduk')->orderBy('urutan')->get();
        $dataPendidikan = Statistik::where('kategori', 'pendidikan')->orderBy('urutan')->get();
        $dataPekerjaan = Statistik::where('kategori', 'pekerjaan')->orderBy('urutan')->get();
        $dataUmkm = Statistik::where('kategori', 'umkm')->orderBy('urutan')->get();

        $beritaTerbaru = Berita::where('is_published', true)->orderBy('tanggal', 'desc')->take(3)->get();
        $galeris = Galeri::latest()->take(8)->get();

        return view('welcome', compact(
            'settings',
            'misiList',
            'ringkasanStats',
            'dataPenduduk',
            'dataPendidikan',
            'dataPekerjaan',
            'dataUmkm',
            'beritaTerbaru',
            'galeris'
        ));
    }
}
