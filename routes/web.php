<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php
use App\Models\Berita;
use App\Models\Statistik;

Route::get('/', function () {
    return view('welcome', [
        'berita_terbaru' => Berita::latest()->take(3)->get(),
        // 'statistik' => Statistik::first(),
    ]);
});