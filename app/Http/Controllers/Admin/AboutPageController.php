<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function edit()
    {
        $about = AboutPage::firstOrCreate(
            ['id' => 1],
            [
                'story_kicker' => 'Who we are',
                'story_title' => 'Recruitment that feels',
                'story_highlight' => 'simple, fast, and dependable',
                'story_description' => 'Sharda Placement is a recruitment and manpower solutions company focused on verified candidates, quick shortlisting, and smooth coordination.',

                'panel_title' => 'Mission & Vision',
                'panel_subtitle' => 'Our long-term direction',
                'panel_badge' => 'Premium',

                'mission_title' => 'Mission',
                'mission_description' => 'Deliver dependable manpower and quality recruitment that saves time and improves productivity.',

                'vision_title' => 'Vision',
                'vision_description' => 'Become the most trusted manpower partner for MSMEs and enterprises.',

                'values_kicker' => 'Values',
                'values_title' => 'What we stand for',
                'values_description' => 'Strong fundamentals that keep hiring smooth and dependable.',

                'process_kicker' => 'Process',
                'process_title' => 'How we work',
                'process_description' => 'A clean, trackable approach from requirement to joining.',

                'cta_title' => 'Ready to hire or apply?',
                'cta_description' => 'Share your details — we’ll connect and guide you with the next steps.',
                'cta_button_1_text' => 'Contact Now',
                'cta_button_1_link' => '#contact',
                'cta_button_2_text' => 'View Jobs',
                'cta_button_2_link' => '#jobs',

                'hero_badge_icon' => 'bi bi-info-circle',
'hero_badge_text' => 'About Sharda Placement',
'hero_title' => 'Reliable manpower and recruitment support',
'hero_highlight' => 'for growing businesses',
'hero_description' => 'We help businesses hire verified manpower with faster shortlisting, smooth coordination and dependable follow-ups.',
'hero_breadcrumb_title' => 'About',
'hero_card_title' => 'Trusted Coordination',
'hero_card_subtitle' => 'Candidate shortlisting & hiring support',
'hero_stat_1_value' => '24–72 hrs',
'hero_stat_1_label' => 'Shortlist time',
'hero_stat_2_value' => 'PAN India',
'hero_stat_2_label' => 'Hiring support',
'hero_support_title' => 'Support',
'hero_support_text' => 'Dedicated follow-ups from requirement to joining.',
'hero_button_text' => 'Contact Now',
'hero_button_link' => '/#contact',

                'status' => 1,
            ]
        );

        return view('admin.about-page.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutPage::firstOrCreate(['id' => 1]);

        $about->update($request->only([
            'story_kicker',
            'story_title',
            'story_highlight',
            'story_description',

            'panel_title',
            'panel_subtitle',
            'panel_badge',

            'mission_title',
            'mission_description',

            'vision_title',
            'vision_description',

            'values_kicker',
            'values_title',
            'values_description',

            'process_kicker',
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

        $about->status = $request->has('status') ? 1 : 0;
        $about->save();

        return redirect()
            ->route('admin.about-page.edit')
            ->with('success', 'About page updated successfully.');
    }
}