<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

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
        $data = $request->except('_token');

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
