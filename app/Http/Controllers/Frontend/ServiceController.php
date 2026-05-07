<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceFeaturePoint;
use App\Models\ServicePage;
use App\Models\ServiceProcess;

class ServiceController extends Controller
{
    public function index()
    {
        $servicePage = ServicePage::active()->firstOrFail();

        $featurePoints = ServiceFeaturePoint::active()
            ->orderBy('sort_order', 'asc')
            ->get();

        $services = Service::active()
            ->orderBy('sort_order', 'asc')
            ->get();

        $processes = ServiceProcess::active()
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.services', compact(
            'servicePage',
            'featurePoints',
            'services',
            'processes'
        ));
    }
}