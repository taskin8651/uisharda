<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutFeature;
use App\Models\AboutPage;
use App\Models\AboutTag;
use App\Models\AuditLog;
use App\Models\ContactFaq;
use App\Models\ContactInquiry;
use App\Models\Industry;
use App\Models\Job;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\WebsiteSetting;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $totalUsers       = User::count();
        $totalRoles       = Role::count();
        $totalPermissions = Permission::count();
        $totalAuditLogs   = AuditLog::count();

        $totalJobs        = Job::count();
        $activeJobs       = Job::where('status', 1)->count();

        $totalIndustries  = Industry::count();
        $activeIndustries = Industry::where('status', 1)->count();

        $totalInquiries   = ContactInquiry::count();
        $newInquiries     = ContactInquiry::where('status', 'new')->count();
        $contactedInquiries = ContactInquiry::where('status', 'contacted')->count();

        $totalFaqs        = ContactFaq::count();

        $aboutPageCount   = AboutPage::count();
        $aboutFeatureCount = AboutFeature::count();
        $aboutTimelineCount = AboutTag::count();

        $websiteSetting = WebsiteSetting::where('status', 1)->first();

        $todayUsers = User::whereDate('created_at', today())->count();

        $recentUsers = User::with('roles')
            ->latest()
            ->take(5)
            ->get();

        $recentInquiries = ContactInquiry::latest()
            ->take(6)
            ->get();

        $recentJobs = Job::latest()
            ->take(5)
            ->get();

        $recentAuditLogs = AuditLog::latest()
            ->take(6)
            ->get();

        $last7DaysLabels = [];
        $last7DaysUsers = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);

            $last7DaysLabels[] = $date->format('D');
            $last7DaysUsers[] = User::whereDate('created_at', $date->toDateString())->count();
        }

        $roleLabels = Role::orderBy('title')->pluck('title')->toArray();

        $roleData = Role::withCount('users')
            ->orderBy('title')
            ->pluck('users_count')
            ->toArray();

        return view('home', compact(
            'totalUsers',
            'totalRoles',
            'totalPermissions',
            'totalAuditLogs',
            'totalJobs',
            'activeJobs',
            'totalIndustries',
            'activeIndustries',
            'totalInquiries',
            'newInquiries',
            'contactedInquiries',
            'totalFaqs',
            'aboutPageCount',
            'aboutFeatureCount',
            'aboutTimelineCount',
            'websiteSetting',
            'todayUsers',
            'recentUsers',
            'recentInquiries',
            'recentJobs',
            'recentAuditLogs',
            'last7DaysLabels',
            'last7DaysUsers',
            'roleLabels',
            'roleData'
        ));
    }
}