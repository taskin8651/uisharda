<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\IndustryPage;
use App\Models\IndustryProcess;

class IndustryController extends Controller
{
    public function index()
    {
        $industryPage = IndustryPage::active()->firstOrFail();

        $industries = Industry::active()
            ->with(['activeRoles'])
            ->orderBy('sort_order', 'asc')
            ->get();

        $processes = IndustryProcess::active()
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.industries', compact(
            'industryPage',
            'industries',
            'processes'
        ));
    }
}