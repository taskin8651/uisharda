<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceFeaturePoint;
use Illuminate\Http\Request;

class ServiceFeaturePointController extends Controller
{
    public function index()
    {
        $points = ServiceFeaturePoint::orderBy('sort_order', 'asc')->get();

        return view('admin.service-feature-points.index', compact('points'));
    }

    public function create()
    {
        return view('admin.service-feature-points.create');
    }

    public function store(Request $request)
    {
        ServiceFeaturePoint::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.service-feature-points.index')
            ->with('success', 'Feature point created successfully.');
    }

    public function edit(ServiceFeaturePoint $serviceFeaturePoint)
    {
        return view('admin.service-feature-points.edit', compact('serviceFeaturePoint'));
    }

    public function update(Request $request, ServiceFeaturePoint $serviceFeaturePoint)
    {
        $serviceFeaturePoint->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.service-feature-points.index')
            ->with('success', 'Feature point updated successfully.');
    }

    public function destroy(ServiceFeaturePoint $serviceFeaturePoint)
    {
        $serviceFeaturePoint->delete();

        return redirect()
            ->route('admin.service-feature-points.index')
            ->with('success', 'Feature point deleted successfully.');
    }
}