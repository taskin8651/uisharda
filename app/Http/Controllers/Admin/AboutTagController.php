<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutTag;
use Illuminate\Http\Request;

class AboutTagController extends Controller
{
    public function index()
    {
        $tags = AboutTag::orderBy('sort_order', 'asc')->get();

        return view('admin.about-tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.about-tags.create');
    }

    public function store(Request $request)
    {
        AboutTag::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.about-tags.index')
            ->with('success', 'Tag created successfully.');
    }

    public function edit(AboutTag $aboutTag)
    {
        return view('admin.about-tags.edit', compact('aboutTag'));
    }

    public function update(Request $request, AboutTag $aboutTag)
    {
        $aboutTag->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.about-tags.index')
            ->with('success', 'Tag updated successfully.');
    }

    public function destroy(AboutTag $aboutTag)
    {
        $aboutTag->delete();

        return redirect()
            ->route('admin.about-tags.index')
            ->with('success', 'Tag deleted successfully.');
    }
}