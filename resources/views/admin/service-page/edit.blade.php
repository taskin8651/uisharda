@extends('layouts.admin')

@section('page-title', 'Service Page')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Service Page</h2>
        <p class="admin-page-subtitle">
            Manage service page hero, featured service, process and CTA content
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.service-page.update') }}">
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
                    <p class="form-card-subtitle">Top banner content and metric card</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Badge Icon</label>
                    <input type="text" name="hero_badge_icon" class="field-input" value="{{ old('hero_badge_icon', $servicePage->hero_badge_icon) }}" placeholder="bi bi-layers">
                </div>

                <div class="field-group">
                    <label class="field-label">Badge Text</label>
                    <input type="text" name="hero_badge_text" class="field-input" value="{{ old('hero_badge_text', $servicePage->hero_badge_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Title</label>
                    <input type="text" name="hero_title" class="field-input" value="{{ old('hero_title', $servicePage->hero_title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Highlight</label>
                    <input type="text" name="hero_highlight" class="field-input" value="{{ old('hero_highlight', $servicePage->hero_highlight) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Description</label>
                    <textarea name="hero_description" rows="4" class="field-input">{{ old('hero_description', $servicePage->hero_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Breadcrumb Title</label>
                    <input type="text" name="hero_breadcrumb_title" class="field-input" value="{{ old('hero_breadcrumb_title', $servicePage->hero_breadcrumb_title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Card Title</label>
                    <input type="text" name="hero_card_title" class="field-input" value="{{ old('hero_card_title', $servicePage->hero_card_title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Card Subtitle</label>
                    <input type="text" name="hero_card_subtitle" class="field-input" value="{{ old('hero_card_subtitle', $servicePage->hero_card_subtitle) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 1 Value</label>
                    <input type="text" name="hero_stat_1_value" class="field-input" value="{{ old('hero_stat_1_value', $servicePage->hero_stat_1_value) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 1 Label</label>
                    <input type="text" name="hero_stat_1_label" class="field-input" value="{{ old('hero_stat_1_label', $servicePage->hero_stat_1_label) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 2 Value</label>
                    <input type="text" name="hero_stat_2_value" class="field-input" value="{{ old('hero_stat_2_value', $servicePage->hero_stat_2_value) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 2 Label</label>
                    <input type="text" name="hero_stat_2_label" class="field-input" value="{{ old('hero_stat_2_label', $servicePage->hero_stat_2_label) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Support Title</label>
                    <input type="text" name="hero_support_title" class="field-input" value="{{ old('hero_support_title', $servicePage->hero_support_title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Support Text</label>
                    <input type="text" name="hero_support_text" class="field-input" value="{{ old('hero_support_text', $servicePage->hero_support_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Button Text</label>
                    <input type="text" name="hero_button_text" class="field-input" value="{{ old('hero_button_text', $servicePage->hero_button_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Button Link</label>
                    <input type="text" name="hero_button_link" class="field-input" value="{{ old('hero_button_link', $servicePage->hero_button_link) }}">
                </div>
            </div>
        </div>

        {{-- FEATURED SERVICE --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <div>
                    <p class="form-card-title">Featured Service Panel</p>
                    <p class="form-card-subtitle">Left side premium featured service content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Featured Badge Icon</label>
                    <input type="text" name="featured_badge_icon" class="field-input" value="{{ old('featured_badge_icon', $servicePage->featured_badge_icon) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Featured Badge Text</label>
                    <input type="text" name="featured_badge_text" class="field-input" value="{{ old('featured_badge_text', $servicePage->featured_badge_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Featured Title</label>
                    <input type="text" name="featured_title" class="field-input" value="{{ old('featured_title', $servicePage->featured_title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Featured Description</label>
                    <textarea name="featured_description" rows="5" class="field-input">{{ old('featured_description', $servicePage->featured_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Button 1 Text</label>
                    <input type="text" name="featured_button_1_text" class="field-input" value="{{ old('featured_button_1_text', $servicePage->featured_button_1_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Button 1 Link</label>
                    <input type="text" name="featured_button_1_link" class="field-input" value="{{ old('featured_button_1_link', $servicePage->featured_button_1_link) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Button 2 Text</label>
                    <input type="text" name="featured_button_2_text" class="field-input" value="{{ old('featured_button_2_text', $servicePage->featured_button_2_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Button 2 Link</label>
                    <input type="text" name="featured_button_2_link" class="field-input" value="{{ old('featured_button_2_link', $servicePage->featured_button_2_link) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 1 Value</label>
                    <input type="text" name="featured_stat_1_value" class="field-input" value="{{ old('featured_stat_1_value', $servicePage->featured_stat_1_value) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 1 Label</label>
                    <input type="text" name="featured_stat_1_label" class="field-input" value="{{ old('featured_stat_1_label', $servicePage->featured_stat_1_label) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 2 Value</label>
                    <input type="text" name="featured_stat_2_value" class="field-input" value="{{ old('featured_stat_2_value', $servicePage->featured_stat_2_value) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 2 Label</label>
                    <input type="text" name="featured_stat_2_label" class="field-input" value="{{ old('featured_stat_2_label', $servicePage->featured_stat_2_label) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 3 Value</label>
                    <input type="text" name="featured_stat_3_value" class="field-input" value="{{ old('featured_stat_3_value', $servicePage->featured_stat_3_value) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 3 Label</label>
                    <input type="text" name="featured_stat_3_label" class="field-input" value="{{ old('featured_stat_3_label', $servicePage->featured_stat_3_label) }}">
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
                    <p class="form-card-subtitle">Heading above process cards</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Eyebrow</label>
                    <input type="text" name="process_eyebrow" class="field-input" value="{{ old('process_eyebrow', $servicePage->process_eyebrow) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Title</label>
                    <input type="text" name="process_title" class="field-input" value="{{ old('process_title', $servicePage->process_title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="process_description" rows="4" class="field-input">{{ old('process_description', $servicePage->process_description) }}</textarea>
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
                    <input type="text" name="cta_title" class="field-input" value="{{ old('cta_title', $servicePage->cta_title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">CTA Description</label>
                    <textarea name="cta_description" rows="4" class="field-input">{{ old('cta_description', $servicePage->cta_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Button 1 Text</label>
                    <input type="text" name="cta_button_1_text" class="field-input" value="{{ old('cta_button_1_text', $servicePage->cta_button_1_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Button 1 Link</label>
                    <input type="text" name="cta_button_1_link" class="field-input" value="{{ old('cta_button_1_link', $servicePage->cta_button_1_link) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Button 2 Text</label>
                    <input type="text" name="cta_button_2_text" class="field-input" value="{{ old('cta_button_2_text', $servicePage->cta_button_2_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Button 2 Link</label>
                    <input type="text" name="cta_button_2_link" class="field-input" value="{{ old('cta_button_2_link', $servicePage->cta_button_2_link) }}">
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $servicePage->status) ? 'checked' : '' }}">
                        <input type="checkbox" name="status" value="1" {{ old('status', $servicePage->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Show Service Page</span>
                    </label>
                </div>
            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            Save Service Page
        </button>
    </div>
</form>

@endsection