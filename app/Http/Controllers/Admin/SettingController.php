<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Show settings page
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    /**
     * Update settings
     */
    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'nullable|string|max:255',
            'site_logo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'favicon'   => 'nullable|image|mimes:png,ico|max:1024',
        ]);

        $setting = Setting::firstOrCreate([]);

        // Upload Site Logo
        if ($request->hasFile('site_logo')) {
            if ($setting->site_logo) {
                Storage::disk('public')->delete($setting->site_logo);
            }
            $setting->site_logo = $request->file('site_logo')->store('settings', 'public');
        }

        // Upload Favicon
        if ($request->hasFile('favicon')) {
            if ($setting->favicon) {
                Storage::disk('public')->delete($setting->favicon);
            }
            $setting->favicon = $request->file('favicon')->store('settings', 'public');
        }

        $setting->site_name = $request->site_name;
        $setting->save();

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Settings updated successfully');
    }
}
