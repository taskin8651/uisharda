<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPage;
use Illuminate\Http\Request;

class JobPageController extends Controller
{
    public function edit()
    {
        $jobPage = JobPage::firstOrCreate(
            ['id' => 1],
            [
                'hero_badge_icon' => 'bi bi-briefcase',
                'hero_badge_text' => 'Job Openings',
                'hero_title' => 'Find verified openings',
                'hero_highlight' => 'and apply fast',
                'hero_description' => 'Browse active job openings and apply quickly with your details.',
                'hero_breadcrumb_title' => 'Jobs',

                'hero_card_title' => 'Apply via Contact',
                'hero_card_subtitle' => 'Send resume optional + details',
                'hero_stat_1_value' => 'Fast',
                'hero_stat_1_label' => 'Response',
                'hero_stat_2_value' => 'NCR',
                'hero_stat_2_label' => 'Locations',
                'hero_tip_title' => 'Tip',
                'hero_tip_text' => 'Mention job title + location while applying.',
                'hero_button_text' => 'Apply Now',
                'hero_button_link' => '/#contact',

                'filter_title_placeholder' => 'Job title (e.g., driver, helper)',
                'filter_location_placeholder' => 'Location (e.g., Noida)',
                'filter_button_text' => 'Filter',
                'filter_chips' => "Urgent Hiring\nVerified Openings\nMultiple Industries\nNew Jobs",

                'sidebar_badge_icon' => 'bi bi-send',
                'sidebar_badge_text' => 'Apply Support',
                'sidebar_title' => 'Apply in 1 minute',
                'sidebar_description' => 'Use the Contact form to apply. Mention the job title and location for faster processing.',
                'sidebar_points' => "Resume optional\nVerified openings\nQuick response",
                'sidebar_button_text' => 'Apply via Contact',
                'sidebar_button_link' => '/#contact',
                'sidebar_footer_text' => 'Available Mon–Sat • 10 AM – 7 PM',

                'tips_title' => 'Candidate Tips',
                'candidate_tips' => "Keep phone number active for calls/WhatsApp.\nMention experience and expected salary.\nShare location preference clearly.\nAttach resume if available.",

                'cta_title' => 'Are you an employer?',
                'cta_description' => 'Share your requirement — we’ll shortlist and coordinate interviews quickly.',
                'cta_button_1_text' => 'Post Requirement',
                'cta_button_1_link' => '/#contact',
                'cta_button_2_text' => 'Services',
                'cta_button_2_link' => '/services',

                'status' => 1,
            ]
        );

        return view('admin.job-page.edit', compact('jobPage'));
    }

    public function update(Request $request)
    {
        $jobPage = JobPage::firstOrCreate(['id' => 1]);

        $jobPage->update($request->only([
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
            'hero_tip_title',
            'hero_tip_text',
            'hero_button_text',
            'hero_button_link',

            'filter_title_placeholder',
            'filter_location_placeholder',
            'filter_button_text',
            'filter_chips',

            'sidebar_badge_icon',
            'sidebar_badge_text',
            'sidebar_title',
            'sidebar_description',
            'sidebar_points',
            'sidebar_button_text',
            'sidebar_button_link',
            'sidebar_footer_text',

            'tips_title',
            'candidate_tips',

            'cta_title',
            'cta_description',
            'cta_button_1_text',
            'cta_button_1_link',
            'cta_button_2_text',
            'cta_button_2_link',
        ]));

        $jobPage->status = $request->has('status') ? 1 : 0;
        $jobPage->save();

        return redirect()
            ->route('admin.job-page.edit')
            ->with('success', 'Job page updated successfully.');
    }
}