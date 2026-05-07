<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutValue;
use Illuminate\Http\Request;

class AboutValueController extends Controller
{
    public function index()
    {
        $values = AboutValue::orderBy('sort_order', 'asc')->get();

        return view('admin.about-values.index', compact('values'));
    }

    public function create()
    {
        return view('admin.about-values.create');
    }

    public function store(Request $request)
    {
        AboutValue::create([
            'icon' => $request->icon,
            'tag' => $request->tag,
            'title' => $request->title,
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.about-values.index')
            ->with('success', 'Value created successfully.');
    }

    public function edit(AboutValue $aboutValue)
    {
        return view('admin.about-values.edit', compact('aboutValue'));
    }

    public function update(Request $request, AboutValue $aboutValue)
    {
        $aboutValue->update([
            'icon' => $request->icon,
            'tag' => $request->tag,
            'title' => $request->title,
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.about-values.index')
            ->with('success', 'Value updated successfully.');
    }

    public function destroy(AboutValue $aboutValue)
    {
        $aboutValue->delete();

        return redirect()
            ->route('admin.about-values.index')
            ->with('success', 'Value deleted successfully.');
    }
}