<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutProcess;
use Illuminate\Http\Request;

class AboutProcessController extends Controller
{
    public function index()
    {
        $processes = AboutProcess::orderBy('sort_order', 'asc')->get();

        return view('admin.about-processes.index', compact('processes'));
    }

    public function create()
    {
        return view('admin.about-processes.create');
    }

    public function store(Request $request)
    {
        AboutProcess::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.about-processes.index')
            ->with('success', 'Process created successfully.');
    }

    public function edit(AboutProcess $aboutProcess)
    {
        return view('admin.about-processes.edit', compact('aboutProcess'));
    }

    public function update(Request $request, AboutProcess $aboutProcess)
    {
        $aboutProcess->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.about-processes.index')
            ->with('success', 'Process updated successfully.');
    }

    public function destroy(AboutProcess $aboutProcess)
    {
        $aboutProcess->delete();

        return redirect()
            ->route('admin.about-processes.index')
            ->with('success', 'Process deleted successfully.');
    }
}