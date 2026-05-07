@extends('layouts.admin')

@section('page-title', 'About Page')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">About Page</h2>
        <p class="admin-page-subtitle">
            Manage about page hero, story, mission, vision, values, process and CTA content
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.about-page.update') }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- HERO SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-star"></i>
                </div>

                <div>
                    <p class="form-card-title">Hero Section</p>
                    <p class="form-card-subtitle">Top banner content and right side metric card</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Badge Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text"
                               name="hero_badge_icon"
                               class="field-input"
                               value="{{ old('hero_badge_icon', $about->hero_badge_icon) }}"
                               placeholder="bi bi-info-circle">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Badge Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text"
                               name="hero_badge_text"
                               class="field-input"
                               value="{{ old('hero_badge_text', $about->hero_badge_text) }}"
                               placeholder="About Sharda Placement">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="hero_title"
                               class="field-input"
                               value="{{ old('hero_title', $about->hero_title) }}"
                               placeholder="Reliable manpower and recruitment support">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Highlight</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-magic icon"></i>
                        <input type="text"
                               name="hero_highlight"
                               class="field-input"
                               value="{{ old('hero_highlight', $about->hero_highlight) }}"
                               placeholder="for growing businesses">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Description</label>
                    <textarea name="hero_description"
                              rows="4"
                              class="field-input"
                              placeholder="Write hero description...">{{ old('hero_description', $about->hero_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Breadcrumb Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-map-signs icon"></i>
                        <input type="text"
                               name="hero_breadcrumb_title"
                               class="field-input"
                               value="{{ old('hero_breadcrumb_title', $about->hero_breadcrumb_title) }}"
                               placeholder="About">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Card Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-id-card icon"></i>
                        <input type="text"
                               name="hero_card_title"
                               class="field-input"
                               value="{{ old('hero_card_title', $about->hero_card_title) }}"
                               placeholder="Trusted Coordination">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Card Subtitle</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>
                        <input type="text"
                               name="hero_card_subtitle"
                               class="field-input"
                               value="{{ old('hero_card_subtitle', $about->hero_card_subtitle) }}"
                               placeholder="Candidate shortlisting & hiring support">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 1 Value</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-chart-line icon"></i>
                        <input type="text"
                               name="hero_stat_1_value"
                               class="field-input"
                               value="{{ old('hero_stat_1_value', $about->hero_stat_1_value) }}"
                               placeholder="24–72 hrs">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 1 Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-font icon"></i>
                        <input type="text"
                               name="hero_stat_1_label"
                               class="field-input"
                               value="{{ old('hero_stat_1_label', $about->hero_stat_1_label) }}"
                               placeholder="Shortlist time">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 2 Value</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-chart-bar icon"></i>
                        <input type="text"
                               name="hero_stat_2_value"
                               class="field-input"
                               value="{{ old('hero_stat_2_value', $about->hero_stat_2_value) }}"
                               placeholder="PAN India">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 2 Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-font icon"></i>
                        <input type="text"
                               name="hero_stat_2_label"
                               class="field-input"
                               value="{{ old('hero_stat_2_label', $about->hero_stat_2_label) }}"
                               placeholder="Hiring support">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Support Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-headset icon"></i>
                        <input type="text"
                               name="hero_support_title"
                               class="field-input"
                               value="{{ old('hero_support_title', $about->hero_support_title) }}"
                               placeholder="Support">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Support Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-comment-dots icon"></i>
                        <input type="text"
                               name="hero_support_text"
                               class="field-input"
                               value="{{ old('hero_support_text', $about->hero_support_text) }}"
                               placeholder="Dedicated follow-ups from requirement to joining.">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Button Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>
                        <input type="text"
                               name="hero_button_text"
                               class="field-input"
                               value="{{ old('hero_button_text', $about->hero_button_text) }}"
                               placeholder="Contact Now">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Button Link</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text"
                               name="hero_button_link"
                               class="field-input"
                               value="{{ old('hero_button_link', $about->hero_button_link) }}"
                               placeholder="/#contact">
                    </div>
                </div>

            </div>
        </div>

        {{-- STORY SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">About Story Section</p>
                    <p class="form-card-subtitle">Main left side intro content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Story Kicker</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text"
                               name="story_kicker"
                               class="field-input"
                               value="{{ old('story_kicker', $about->story_kicker) }}"
                               placeholder="Who we are">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Story Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="story_title"
                               class="field-input"
                               value="{{ old('story_title', $about->story_title) }}"
                               placeholder="Recruitment that feels">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Story Highlight</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>
                        <input type="text"
                               name="story_highlight"
                               class="field-input"
                               value="{{ old('story_highlight', $about->story_highlight) }}"
                               placeholder="simple, fast, and dependable">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Story Description</label>
                    <textarea name="story_description"
                              rows="5"
                              class="field-input"
                              placeholder="Write about company...">{{ old('story_description', $about->story_description) }}</textarea>
                </div>

            </div>
        </div>

        {{-- MISSION VISION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bullseye"></i>
                </div>

                <div>
                    <p class="form-card-title">Mission & Vision Panel</p>
                    <p class="form-card-subtitle">Right side premium panel content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Panel Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="panel_title"
                               class="field-input"
                               value="{{ old('panel_title', $about->panel_title) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Panel Subtitle</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>
                        <input type="text"
                               name="panel_subtitle"
                               class="field-input"
                               value="{{ old('panel_subtitle', $about->panel_subtitle) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Panel Badge</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-certificate icon"></i>
                        <input type="text"
                               name="panel_badge"
                               class="field-input"
                               value="{{ old('panel_badge', $about->panel_badge) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Mission Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-bullseye icon"></i>
                        <input type="text"
                               name="mission_title"
                               class="field-input"
                               value="{{ old('mission_title', $about->mission_title) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Mission Description</label>
                    <textarea name="mission_description"
                              rows="4"
                              class="field-input">{{ old('mission_description', $about->mission_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Vision Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-eye icon"></i>
                        <input type="text"
                               name="vision_title"
                               class="field-input"
                               value="{{ old('vision_title', $about->vision_title) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Vision Description</label>
                    <textarea name="vision_description"
                              rows="4"
                              class="field-input">{{ old('vision_description', $about->vision_description) }}</textarea>
                </div>

            </div>
        </div>

        {{-- VALUES --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-gem"></i>
                </div>

                <div>
                    <p class="form-card-title">Values Section</p>
                    <p class="form-card-subtitle">Heading and description above value cards</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Values Kicker</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text"
                               name="values_kicker"
                               class="field-input"
                               value="{{ old('values_kicker', $about->values_kicker) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Values Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="values_title"
                               class="field-input"
                               value="{{ old('values_title', $about->values_title) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Values Description</label>
                    <textarea name="values_description"
                              rows="4"
                              class="field-input">{{ old('values_description', $about->values_description) }}</textarea>
                </div>

            </div>
        </div>

        {{-- PROCESS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-route"></i>
                </div>

                <div>
                    <p class="form-card-title">Process Section</p>
                    <p class="form-card-subtitle">Heading and description above process cards</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Process Kicker</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text"
                               name="process_kicker"
                               class="field-input"
                               value="{{ old('process_kicker', $about->process_kicker) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Process Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="process_title"
                               class="field-input"
                               value="{{ old('process_title', $about->process_title) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Process Description</label>
                    <textarea name="process_description"
                              rows="4"
                              class="field-input">{{ old('process_description', $about->process_description) }}</textarea>
                </div>

            </div>
        </div>

        {{-- CTA --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-paper-plane"></i>
                </div>

                <div>
                    <p class="form-card-title">CTA Section</p>
                    <p class="form-card-subtitle">Bottom call to action strip</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">CTA Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="cta_title"
                               class="field-input"
                               value="{{ old('cta_title', $about->cta_title) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">CTA Description</label>
                    <textarea name="cta_description"
                              rows="4"
                              class="field-input">{{ old('cta_description', $about->cta_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Button 1 Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>
                        <input type="text"
                               name="cta_button_1_text"
                               class="field-input"
                               value="{{ old('cta_button_1_text', $about->cta_button_1_text) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Button 1 Link</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text"
                               name="cta_button_1_link"
                               class="field-input"
                               value="{{ old('cta_button_1_link', $about->cta_button_1_link) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Button 2 Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>
                        <input type="text"
                               name="cta_button_2_text"
                               class="field-input"
                               value="{{ old('cta_button_2_text', $about->cta_button_2_text) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Button 2 Link</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text"
                               name="cta_button_2_link"
                               class="field-input"
                               value="{{ old('cta_button_2_link', $about->cta_button_2_link) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $about->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               {{ old('status', $about->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Show About Page</span>
                    </label>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            Save About Page
        </button>
    </div>
</form>

@endsection