<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $misiList = isset($settings['misi']) ? json_decode($settings['misi'], true) : [];
        return view('admin.setting.index', compact('settings', 'misiList'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'foto_hero_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        // Handle upload foto hero
        if ($request->hasFile('foto_hero_file')) {
            // Hapus file lama jika ada dan bukan URL eksternal
            $oldFoto = Setting::get('foto_hero');
            if ($oldFoto && str_contains($oldFoto, '/storage/settings/')) {
                $oldPath = str_replace(asset('storage/settings/'), '', $oldFoto);
                Storage::disk('public')->delete('settings/' . basename($oldPath));
            }
            $path = $request->file('foto_hero_file')->store('settings', 'public');
            Setting::set('foto_hero', asset('storage/' . $path));
        }

        $data = $request->except(['_token', 'foto_hero_file']);

        if ($request->has('misi_items')) {
            $misiItems = array_filter(array_map('trim', $request->input('misi_items')));
            Setting::set('misi', json_encode(array_values($misiItems)));
        }

        foreach ($data as $key => $value) {
            if ($key !== 'misi_items') {
                Setting::set($key, $value);
            }
        }

        return redirect()->route('admin.setting.index')->with('success', 'Pengaturan profil kelurahan berhasil diperbarui!');
    }
}
