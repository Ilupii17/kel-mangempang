<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $pesans = Kontak::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.kontak.index', compact('pesans'));
    }

    public function show(Kontak $kontak)
    {
        $kontak->update(['is_read' => true]);
        return view('admin.kontak.show', compact('kontak'));
    }

    public function destroy(Kontak $kontak)
    {
        $kontak->delete();
        return redirect()->route('admin.kontak.index')->with('success', 'Pesan berhasil dihapus!');
    }
}
