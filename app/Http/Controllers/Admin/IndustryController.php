<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::withCount('roles')
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $slug = $request->slug ?: Str::slug($request->title);

        Industry::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'slug' => $slug,
            'subtitle' => $request->subtitle,

            'detail_badge_icon' => $request->detail_badge_icon,
            'detail_badge_text' => $request->detail_badge_text,
            'detail_chip_icon' => $request->detail_chip_icon,
            'detail_chip_text' => $request->detail_chip_text,
            'detail_title' => $request->detail_title,
            'detail_description' => $request->detail_description,

            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'job_button_text' => $request->job_button_text,
            'job_button_link' => $request->job_button_link,

            'sort_order' => $request->sort_order ?? 0,
            'is_special' => $request->has('is_special') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.industries.index')
            ->with('success', 'Industry created successfully.');
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $slug = $request->slug ?: Str::slug($request->title);

        $industry->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'slug' => $slug,
            'subtitle' => $request->subtitle,

            'detail_badge_icon' => $request->detail_badge_icon,
            'detail_badge_text' => $request->detail_badge_text,
            'detail_chip_icon' => $request->detail_chip_icon,
            'detail_chip_text' => $request->detail_chip_text,
            'detail_title' => $request->detail_title,
            'detail_description' => $request->detail_description,

            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'job_button_text' => $request->job_button_text,
            'job_button_link' => $request->job_button_link,

            'sort_order' => $request->sort_order ?? 0,
            'is_special' => $request->has('is_special') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.industries.index')
            ->with('success', 'Industry updated successfully.');
    }

    public function destroy(Industry $industry)
    {
        $industry->delete();

        return redirect()
            ->route('admin.industries.index')
            ->with('success', 'Industry deleted successfully.');
    }
}