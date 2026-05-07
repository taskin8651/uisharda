<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    public function edit()
    {
        $setting = WebsiteSetting::firstOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Sharda Placement',
                'site_tagline' => 'Preparing your experience…',

                'phone' => '+91 99390 10504',
                'email' => 'info@shardaplacement.in',
                'whatsapp_number' => '919939010504',
                'address' => 'F-17, 1st floor, Pushpanjali Complex, Boring Road, Patna, Bihar - 800004',
                'location_short' => 'Patna',
                'office_hours' => 'Mon–Sat: 10:00 AM – 7:00 PM',

                'topbar_button_text' => 'Get Quote',
                'topbar_button_link' => '/contact',

                'nav_button_1_text' => 'Browse Jobs',
                'nav_button_1_link' => '/jobs',
                'nav_button_2_text' => 'Post Requirement',
                'nav_button_2_link' => '/contact',

                'footer_about_text' => 'Reliable recruitment and manpower services for businesses across industries. We help companies scale with verified and role-matched workforce.',
                'newsletter_title' => 'Newsletter',
                'newsletter_text' => 'Get updates about new job openings and recruitment insights.',
                'newsletter_placeholder' => 'Enter your email',
                'privacy_text' => 'We respect your privacy.',
                'copyright_text' => 'All rights reserved.',

                'default_meta_title' => 'Sharda Placement | Recruitment & Manpower Services',
                'default_meta_description' => 'Reliable recruitment and manpower services for businesses across industries.',
                'default_meta_keywords' => 'Sharda Placement, recruitment, manpower, jobs, staffing, Patna',

                'status' => 1,
            ]
        );

        return view('admin.website-settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = WebsiteSetting::firstOrCreate(['id' => 1]);

        $setting->update($request->only([
            'site_name',
            'site_tagline',

            'phone',
            'email',
            'whatsapp_number',
            'address',
            'location_short',
            'office_hours',

            'facebook_url',
            'instagram_url',
            'linkedin_url',
            'whatsapp_url',

            'topbar_button_text',
            'topbar_button_link',

            'nav_button_1_text',
            'nav_button_1_link',
            'nav_button_2_text',
            'nav_button_2_link',

            'footer_about_text',
            'newsletter_title',
            'newsletter_text',
            'newsletter_placeholder',
            'privacy_text',
            'copyright_text',

            'google_map_embed',

            'default_meta_title',
            'default_meta_description',
            'default_meta_keywords',
        ]));

        $setting->status = $request->has('status') ? 1 : 0;
        $setting->save();

        if ($request->hasFile('logo')) {
            $setting
                ->addMediaFromRequest('logo')
                ->toMediaCollection('website_logo');
        }

        if ($request->hasFile('favicon')) {
            $setting
                ->addMediaFromRequest('favicon')
                ->toMediaCollection('website_favicon');
        }

        return redirect()
            ->route('admin.website-settings.edit')
            ->with('success', 'Website settings updated successfully.');
    }
}