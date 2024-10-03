<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings.index', compact('settings'));
    }

    public function create()
    {
        $settings = Setting::first();
        return view('admin.settings.create' , compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'app_name' => 'required|string|max:255',
            'app_status' => 'required|boolean',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'social_media_links' => 'required|json',
        ]);

        $logoPath = $request->file('logo')->store('logos', 'public');

        Setting::create([
            'logo' => $logoPath,
            'app_name' => $request->app_name,
            'app_status' => $request->app_status,
            'email' => $request->email,
            'phone' => $request->phone,
            'social_media_links' => $request->social_media_links,
        ]);

        return redirect()->route('settings.index')->with('success', 'Settings created successfully.');
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'app_name' => 'required|string|max:255',
            'app_status' => 'required|boolean',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'social_media_links' => 'required|json',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $setting->logo = $logoPath;
        }

        $setting->app_name = $request->app_name;
        $setting->app_status = $request->app_status;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->social_media_links = $request->social_media_links;
        $setting->save();

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('settings.index')->with('success', 'Settings deleted successfully.');
    }
}
