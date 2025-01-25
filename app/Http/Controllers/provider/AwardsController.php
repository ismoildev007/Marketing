<?php

namespace App\Http\Controllers\provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Award;
use App\Models\ProviderCompany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AwardsController extends Controller
{

    public function index()
    {
        // Get the provider's company
        $providerCompany = ProviderCompany::where('provider_id', Auth::user()->id)->first();

        if ($providerCompany) {
            // Get all providers for this company
            $providerIds = ProviderCompany::where('company_id', $providerCompany->company_id)
                ->pluck('provider_id');

            // Get the latest team info for all providers in the company
            $awards = Award::whereIn('provider_id', $providerIds)->get();
        } else {
            // If the provider is not associated with any company, return an empty collection
            $awards = collect();
        }
        return view('provider.awards.index', compact('awards'));
    }


    public function create()
    {
        return view('provider.awards.create'); // Render the form for creating an award
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg,gif|max:2048', // Rasm uchun validatsiya
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public'); // Faylni saqlash
        }

        Award::create($data);

        return redirect()->route('awards.index')->with('success', 'Award created successfully!');
    }


    public function show(string $id)
    {
        $award = Award::findOrFail($id);
        return view('provider.awards.show', compact('award'));
    }


    public function edit(string $id)
    {
        $award = Award::findOrFail($id);
        return view('provider.awards.edit', compact('award'));
    }


    public function update(Request $request, $id)
    {
        $award = Award::find($id);

        if (!$award) {
            return redirect()->route('awards.index')->with('error', 'Award not found!');
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filePath = $file->store('awards', 'public'); // 'storage/app/public/awards' ga saqlaydi
            if ($award->image && Storage::disk('public')->exists($award->image)) {
                Storage::disk('public')->delete($award->image);
            }
            $award->image = $filePath;
        }
        $award->update($request->except('image'));

        return redirect()->route('awards.index')->with('success', 'Award updated successfully!');
    }


    public function destroy(string $id)
    {
        $award = Award::findOrFail($id);
        $award->delete();

        return redirect()->route('awards.index')->with('success', 'Award deleted successfully!');
    }
}
