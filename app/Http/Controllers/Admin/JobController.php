<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('sort_order', 'asc')->get();

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        Job::create([
            'job_type_icon' => $request->job_type_icon,
            'job_type' => $request->job_type,
            'location' => $request->location,
            'title' => $request->title,
            'industry' => $request->industry,
            'experience' => $request->experience,
            'skills' => $request->skills,
            'salary' => $request->salary,
            'posted_text' => $request->posted_text,
            'responsibilities' => $request->responsibilities,
            'requirements' => $request->requirements,
            'apply_button_text' => $request->apply_button_text,
            'apply_link' => $request->apply_link,
            'how_to_apply_title' => $request->how_to_apply_title,
            'how_to_apply_text' => $request->how_to_apply_text,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Job created successfully.');
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $job->update([
            'job_type_icon' => $request->job_type_icon,
            'job_type' => $request->job_type,
            'location' => $request->location,
            'title' => $request->title,
            'industry' => $request->industry,
            'experience' => $request->experience,
            'skills' => $request->skills,
            'salary' => $request->salary,
            'posted_text' => $request->posted_text,
            'responsibilities' => $request->responsibilities,
            'requirements' => $request->requirements,
            'apply_button_text' => $request->apply_button_text,
            'apply_link' => $request->apply_link,
            'how_to_apply_title' => $request->how_to_apply_title,
            'how_to_apply_text' => $request->how_to_apply_text,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Job deleted successfully.');
    }
}