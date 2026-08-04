<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string|max:2000',
        ]);

        // Defensive sanitization against XSS
        $sanitized = [
            'nama' => strip_tags(trim($validated['nama'])),
            'email' => strtolower(trim($validated['email'])),
            'subjek' => strip_tags(trim($validated['subjek'])),
            'pesan' => strip_tags(trim($validated['pesan'])),
        ];

        Kontak::create($sanitized);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Terima kasih, pesan Anda berhasil terkirim! Tim kelurahan akan menindaklanjuti pesan Anda.'
            ]);
        }

        return redirect()->back()->with('success', 'Pesan Anda berhasil terkirim!');
    }
}
