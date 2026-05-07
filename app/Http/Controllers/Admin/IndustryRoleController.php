<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\IndustryRole;
use Illuminate\Http\Request;

class IndustryRoleController extends Controller
{
    public function index()
    {
        $roles = IndustryRole::with('industry')
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('admin.industry-roles.index', compact('roles'));
    }

    public function create()
    {
        $industries = Industry::orderBy('title')->get();

        return view('admin.industry-roles.create', compact('industries'));
    }

    public function store(Request $request)
    {
        IndustryRole::create([
            'industry_id' => $request->industry_id,
            'icon' => $request->icon,
            'title' => $request->title,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.industry-roles.index')
            ->with('success', 'Industry role created successfully.');
    }

    public function edit(IndustryRole $industryRole)
    {
        $industries = Industry::orderBy('title')->get();

        return view('admin.industry-roles.edit', compact('industryRole', 'industries'));
    }

    public function update(Request $request, IndustryRole $industryRole)
    {
        $industryRole->update([
            'industry_id' => $request->industry_id,
            'icon' => $request->icon,
            'title' => $request->title,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.industry-roles.index')
            ->with('success', 'Industry role updated successfully.');
    }

    public function destroy(IndustryRole $industryRole)
    {
        $industryRole->delete();

        return redirect()
            ->route('admin.industry-roles.index')
            ->with('success', 'Industry role deleted successfully.');
    }
}