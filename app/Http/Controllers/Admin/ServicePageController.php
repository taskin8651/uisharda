<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicePage;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    public function edit()
    {
        $servicePage = ServicePage::firstOrCreate(
            ['id' => 1],
            [
                'hero_badge_icon' => 'bi bi-layers',
                'hero_badge_text' => 'Our Services',
                'hero_title' => 'Premium staffing solutions',
                'hero_highlight' => 'built for speed & scale',
                'hero_description' => 'From permanent recruitment to bulk manpower deployment — we shortlist, coordinate, and help you hire with better speed and reliability.',
                'hero_breadcrumb_title' => 'Services',
                'hero_card_title' => 'Need manpower?',
                'hero_card_subtitle' => 'Share role details and headcount.',
                'hero_stat_1_value' => '24–72 hrs',
                'hero_stat_1_label' => 'Shortlist time',
                'hero_stat_2_value' => '10+',
                'hero_stat_2_label' => 'Industries',
                'hero_support_title' => 'Support',
                'hero_support_text' => 'Dedicated coordination & follow-ups.',
                'hero_button_text' => 'Get a Quote',
                'hero_button_link' => '/#contact',

                'featured_badge_icon' => 'bi bi-stars',
                'featured_badge_text' => 'Featured Service',
                'featured_title' => 'Bulk Hiring & Rapid Fulfillment',
                'featured_description' => 'When you need manpower at scale — we shortlist and coordinate quickly for warehouses, factories, logistics, security, and facility operations.',
                'featured_button_1_text' => 'Discuss Requirement',
                'featured_button_1_link' => '/#contact',
                'featured_button_2_text' => 'Industries',
                'featured_button_2_link' => '/industries',
                'featured_stat_1_value' => '100+',
                'featured_stat_1_label' => 'Clients',
                'featured_stat_2_value' => '500+',
                'featured_stat_2_label' => 'Placements',
                'featured_stat_3_value' => '10+',
                'featured_stat_3_label' => 'Sectors',

                'process_eyebrow' => 'Process',
                'process_title' => 'How hiring works with us',
                'process_description' => 'Clear steps for fast coordination and better outcomes.',

                'cta_title' => 'Want to hire faster?',
                'cta_description' => 'Share your requirement — we’ll coordinate quickly with shortlisted profiles.',
                'cta_button_1_text' => 'Get a Quote',
                'cta_button_1_link' => '/#contact',
                'cta_button_2_text' => 'Browse Jobs',
                'cta_button_2_link' => '/#jobs',

                'status' => 1,
            ]
        );

        return view('admin.service-page.edit', compact('servicePage'));
    }

    public function update(Request $request)
    {
        $servicePage = ServicePage::firstOrCreate(['id' => 1]);

        $servicePage->update($request->only([
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

            'featured_badge_icon',
            'featured_badge_text',
            'featured_title',
            'featured_description',
            'featured_button_1_text',
            'featured_button_1_link',
            'featured_button_2_text',
            'featured_button_2_link',
            'featured_stat_1_value',
            'featured_stat_1_label',
            'featured_stat_2_value',
            'featured_stat_2_label',
            'featured_stat_3_value',
            'featured_stat_3_label',

            'process_eyebrow',
            'process_title',
            'process_description',

            'cta_title',
            'cta_description',
            'cta_button_1_text',
            'cta_button_1_link',
            'cta_button_2_text',
            'cta_button_2_link',
        ]));

        $servicePage->status = $request->has('status') ? 1 : 0;
        $servicePage->save();

        return redirect()
            ->route('admin.service-page.edit')
            ->with('success', 'Service page updated successfully.');
    }
}