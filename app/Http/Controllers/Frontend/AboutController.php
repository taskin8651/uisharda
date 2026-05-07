<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutFeature;
use App\Models\AboutPage;
use App\Models\AboutProcess;
use App\Models\AboutTag;
use App\Models\AboutValue;

class AboutController extends Controller
{
    public function index()
    {
        $about = AboutPage::active()->firstOrFail();

        $storyFeatures = AboutFeature::active()
            ->orderBy('sort_order', 'asc')
            ->get();

        $tags = AboutTag::active()
            ->orderBy('sort_order', 'asc')
            ->get();

        $values = AboutValue::active()
            ->orderBy('sort_order', 'asc')
            ->get();

        $processSteps = AboutProcess::active()
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.about', compact(
            'about',
            'storyFeatures',
            'tags',
            'values',
            'processSteps'
        ));
    }
}