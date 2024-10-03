<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Setting;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        $settings = Setting::first();
        return view('admin.partners.index', compact('partners', 'settings'));
    }

    public function create()
    {
        $settings = Setting::first();
        return view('admin.partners.create',compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $logoPath = $request->file('logo')->store('logos', 'public');

        Partner::create([
            'name' => $request->name,
            'logo' => $logoPath,
        ]);

        return redirect()->route('partners.index')->with('success', 'Partner created successfully.');
    }

    public function edit(Partner $partner)
    {
        $settings = Setting::first();
        return view('admin.partners.edit', compact('partner' , 'settings'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $partner->logo = $logoPath;
        }

        $partner->name = $request->name;
        $partner->save();

        return redirect()->route('partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index')->with('success', 'Partner deleted successfully.');
    }
}
