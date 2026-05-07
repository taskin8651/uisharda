<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceProcess;
use Illuminate\Http\Request;

class ServiceProcessController extends Controller
{
    public function index()
    {
        $processes = ServiceProcess::orderBy('sort_order', 'asc')->get();

        return view('admin.service-processes.index', compact('processes'));
    }

    public function create()
    {
        return view('admin.service-processes.create');
    }

    public function store(Request $request)
    {
        ServiceProcess::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'is_special' => $request->has('is_special') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.service-processes.index')
            ->with('success', 'Service process created successfully.');
    }

    public function edit(ServiceProcess $serviceProcess)
    {
        return view('admin.service-processes.edit', compact('serviceProcess'));
    }

    public function update(Request $request, ServiceProcess $serviceProcess)
    {
        $serviceProcess->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'is_special' => $request->has('is_special') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.service-processes.index')
            ->with('success', 'Service process updated successfully.');
    }

    public function destroy(ServiceProcess $serviceProcess)
    {
        $serviceProcess->delete();

        return redirect()
            ->route('admin.service-processes.index')
            ->with('success', 'Service process deleted successfully.');
    }
}