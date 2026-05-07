<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndustryPage;
use Illuminate\Http\Request;

class IndustryPageController extends Controller
{
    public function edit()
    {
        $industryPage = IndustryPage::firstOrCreate(
            ['id' => 1],
            [
                'grid_eyebrow' => 'Explore',
                'grid_title' => 'Industries at a glance',
                'grid_description' => 'Select an industry to see typical roles and hiring support.',
                'grid_button_1_text' => 'View Services',
                'grid_button_1_link' => '/services',
                'grid_button_2_text' => 'Get Quote',
                'grid_button_2_link' => '/#contact',

                'detail_eyebrow' => 'Details',
                'detail_title' => 'Roles & manpower support by industry',
                'detail_description' => 'These are sample role categories — replace with real offerings later.',

                'process_eyebrow' => 'Process',
                'process_title' => 'How it works',
                'process_description' => 'Simple steps from requirement to joining.',

                'cta_title' => 'Need manpower for your industry?',
                'cta_description' => 'Share your requirement — we’ll shortlist profiles and coordinate interviews quickly.',
                'cta_button_1_text' => 'Share Requirement',
                'cta_button_1_link' => '/#contact',
                'cta_button_2_text' => 'Browse Jobs',
                'cta_button_2_link' => '/#jobs',

                'hero_badge_icon' => 'bi bi-buildings',
'hero_badge_text' => 'Industries We Serve',
'hero_title' => 'Role-specific manpower support',
'hero_highlight' => 'across key industries',
'hero_description' => 'Manufacturing, warehouse, logistics, security, hospitality, healthcare and more — we shortlist and coordinate workforce based on role, location and joining timeline.',
'hero_breadcrumb_title' => 'Industries',
'hero_card_title' => 'Fast Coordination',
'hero_card_subtitle' => 'Shortlisting & scheduling support',
'hero_stat_1_value' => '24–72 hrs',
'hero_stat_1_label' => 'Shortlist time',
'hero_stat_2_value' => '10+',
'hero_stat_2_label' => 'Sectors',
'hero_support_title' => 'Support',
'hero_support_text' => 'Dedicated follow-ups for joining.',
'hero_button_text' => 'Share Requirement',
'hero_button_link' => '/#contact',

                'status' => 1,
            ]
        );

        return view('admin.industry-page.edit', compact('industryPage'));
    }

    public function update(Request $request)
    {
        $industryPage = IndustryPage::firstOrCreate(['id' => 1]);

        $industryPage->update($request->only([
            'grid_eyebrow',
            'grid_title',
            'grid_description',
            'grid_button_1_text',
            'grid_button_1_link',
            'grid_button_2_text',
            'grid_button_2_link',

            'detail_eyebrow',
            'detail_title',
            'detail_description',

            'process_eyebrow',
            'process_title',
            'process_description',

            'cta_title',
            'cta_description',
            'cta_button_1_text',
            'cta_button_1_link',
            'cta_button_2_text',
            'cta_button_2_link',

            'hero_badge_icon',
'hero_badge_text',
'hero_title',
'hero_highlight',
'hero_description',
'hero_breadcrumb_title',
'hero_card_title',
'hero_card_subtitle',
'hero_stat_1_value',
'hero_stat_1_label',
'hero_stat_2_value',
'hero_stat_2_label',
'hero_support_title',
'hero_support_text',
'hero_button_text',
'hero_button_link',
        ]));

        $industryPage->status = $request->has('status') ? 1 : 0;
        $industryPage->save();

        return redirect()
            ->route('admin.industry-page.edit')
            ->with('success', 'Industry page updated successfully.');
    }
}