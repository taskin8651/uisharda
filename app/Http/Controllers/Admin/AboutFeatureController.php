<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutFeature;
use Illuminate\Http\Request;

class AboutFeatureController extends Controller
{
    public function index()
    {
        $features = AboutFeature::orderBy('sort_order', 'asc')->get();

        return view('admin.about-features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.about-features.create');
    }

    public function store(Request $request)
    {
        AboutFeature::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.about-features.index')
            ->with('success', 'Feature created successfully.');
    }

    public function edit(AboutFeature $aboutFeature)
    {
        return view('admin.about-features.edit', compact('aboutFeature'));
    }

    public function update(Request $request, AboutFeature $aboutFeature)
    {
        $aboutFeature->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.about-features.index')
            ->with('success', 'Feature updated successfully.');
    }

    public function destroy(AboutFeature $aboutFeature)
    {
        $aboutFeature->delete();

        return redirect()
            ->route('admin.about-features.index')
            ->with('success', 'Feature deleted successfully.');
    }
}