<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndustryProcess;
use Illuminate\Http\Request;

class IndustryProcessController extends Controller
{
    public function index()
    {
        $processes = IndustryProcess::orderBy('sort_order', 'asc')->get();

        return view('admin.industry-processes.index', compact('processes'));
    }

    public function create()
    {
        return view('admin.industry-processes.create');
    }

    public function store(Request $request)
    {
        IndustryProcess::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'is_special' => $request->has('is_special') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.industry-processes.index')
            ->with('success', 'Industry process created successfully.');
    }

    public function edit(IndustryProcess $industryProcess)
    {
        return view('admin.industry-processes.edit', compact('industryProcess'));
    }

    public function update(Request $request, IndustryProcess $industryProcess)
    {
        $industryProcess->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'is_special' => $request->has('is_special') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.industry-processes.index')
            ->with('success', 'Industry process updated successfully.');
    }

    public function destroy(IndustryProcess $industryProcess)
    {
        $industryProcess->delete();

        return redirect()
            ->route('admin.industry-processes.index')
            ->with('success', 'Industry process deleted successfully.');
    }
}