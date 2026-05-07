<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutFeature;
use App\Models\AboutPage;
use App\Models\AboutTag;
use App\Models\ServiceFeaturePoint;
use App\Models\ServicePage;
use App\Models\WebsiteSetting;
use App\Models\Service;
use App\Models\Industry;
use App\Models\Job;
use App\Models\JobPage;

class IndexController extends Controller
{
    public function index()
    {
        $websiteSetting = WebsiteSetting::where('status', 1)->first();

        $about = AboutPage::where('status', 1)->first();

        $aboutFeatures = AboutFeature::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        $aboutTimelines = AboutTag::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();
   $servicePage = ServicePage::active()->firstOrFail();
             $featurePoints = ServiceFeaturePoint::active()
            ->orderBy('sort_order', 'asc')
            ->get();

             $services = Service::active()
            ->orderBy('sort_order', 'asc')
            ->get();

             $industries = Industry::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

            $jobs = Job::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->take(4)
            ->get();

             $jobPage = JobPage::active()->firstOrFail();


        return view('frontend.index', compact(
            'websiteSetting',
            'about',
            'aboutFeatures',
            'aboutTimelines',
            'featurePoints',
                'servicePage',
                'services',
                'industries',
                'jobs',
                'jobPage'

        ));
    }
}