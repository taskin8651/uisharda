<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobPage;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobPage = JobPage::active()->firstOrFail();

        $jobsQuery = Job::active()->orderBy('sort_order', 'asc');

        if ($request->filled('title')) {
            $jobsQuery->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('location')) {
            $jobsQuery->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->filled('industry')) {
            $jobsQuery->where('industry', $request->industry);
        }

        $jobs = $jobsQuery->paginate(6)->withQueryString();

        $industries = Job::active()
            ->whereNotNull('industry')
            ->select('industry')
            ->distinct()
            ->orderBy('industry')
            ->pluck('industry');

        return view('frontend.jobs', compact(
            'jobPage',
            'jobs',
            'industries'
        ));
    }
}