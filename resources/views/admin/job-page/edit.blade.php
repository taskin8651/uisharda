@extends('layouts.admin')

@section('page-title', 'Job Page')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Job Page</h2>
        <p class="admin-page-subtitle">
            Manage job page hero, filter, apply support sidebar, candidate tips and CTA
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.job-page.update') }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-star"></i></div>
                <div>
                    <p class="form-card-title">Hero Section</p>
                    <p class="form-card-subtitle">Top banner content and right metric card</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach([
                    'hero_badge_icon' => 'Badge Icon',
                    'hero_badge_text' => 'Badge Text',
                    'hero_title' => 'Hero Title',
                    'hero_highlight' => 'Hero Highlight',
                    'hero_breadcrumb_title' => 'Breadcrumb Title',
                    'hero_card_title' => 'Hero Card Title',
                    'hero_card_subtitle' => 'Hero Card Subtitle',
                    'hero_stat_1_value' => 'Stat 1 Value',
                    'hero_stat_1_label' => 'Stat 1 Label',
                    'hero_stat_2_value' => 'Stat 2 Value',
                    'hero_stat_2_label' => 'Stat 2 Label',
                    'hero_tip_title' => 'Tip Title',
                    'hero_tip_text' => 'Tip Text',
                    'hero_button_text' => 'Button Text',
                    'hero_button_link' => 'Button Link',
                ] as $field => $label)
                    <div class="field-group">
                        <label class="field-label">{{ $label }}</label>
                        <input type="text" name="{{ $field }}" class="field-input" value="{{ old($field, $jobPage->$field) }}">
                    </div>
                @endforeach

                <div class="field-group">
                    <label class="field-label">Hero Description</label>
                    <textarea name="hero_description" rows="4" class="field-input">{{ old('hero_description', $jobPage->hero_description) }}</textarea>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-filter"></i></div>
                <div>
                    <p class="form-card-title">Filter Section</p>
                    <p class="form-card-subtitle">Search box placeholders and filter chips</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Title Placeholder</label>
                    <input type="text" name="filter_title_placeholder" class="field-input" value="{{ old('filter_title_placeholder', $jobPage->filter_title_placeholder) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Location Placeholder</label>
                    <input type="text" name="filter_location_placeholder" class="field-input" value="{{ old('filter_location_placeholder', $jobPage->filter_location_placeholder) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Filter Button Text</label>
                    <input type="text" name="filter_button_text" class="field-input" value="{{ old('filter_button_text', $jobPage->filter_button_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Filter Chips</label>
                    <textarea name="filter_chips" rows="5" class="field-input">{{ old('filter_chips', $jobPage->filter_chips) }}</textarea>
                    <p class="field-hint">One chip per line</p>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-paper-plane"></i></div>
                <div>
                    <p class="form-card-title">Apply Sidebar</p>
                    <p class="form-card-subtitle">Right side sticky apply support card</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach([
                    'sidebar_badge_icon' => 'Badge Icon',
                    'sidebar_badge_text' => 'Badge Text',
                    'sidebar_title' => 'Sidebar Title',
                    'sidebar_button_text' => 'Button Text',
                    'sidebar_button_link' => 'Button Link',
                    'sidebar_footer_text' => 'Footer Text',
                ] as $field => $label)
                    <div class="field-group">
                        <label class="field-label">{{ $label }}</label>
                        <input type="text" name="{{ $field }}" class="field-input" value="{{ old($field, $jobPage->$field) }}">
                    </div>
                @endforeach

                <div class="field-group">
                    <label class="field-label">Sidebar Description</label>
                    <textarea name="sidebar_description" rows="4" class="field-input">{{ old('sidebar_description', $jobPage->sidebar_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Sidebar Points</label>
                    <textarea name="sidebar_points" rows="5" class="field-input">{{ old('sidebar_points', $jobPage->sidebar_points) }}</textarea>
                    <p class="field-hint">One point per line</p>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-lightbulb"></i></div>
                <div>
                    <p class="form-card-title">Candidate Tips</p>
                    <p class="form-card-subtitle">Tips card content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Tips Title</label>
                    <input type="text" name="tips_title" class="field-input" value="{{ old('tips_title', $jobPage->tips_title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Candidate Tips</label>
                    <textarea name="candidate_tips" rows="6" class="field-input">{{ old('candidate_tips', $jobPage->candidate_tips) }}</textarea>
                    <p class="field-hint">One tip per line</p>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-bullhorn"></i></div>
                <div>
                    <p class="form-card-title">CTA Section</p>
                    <p class="form-card-subtitle">Bottom employer CTA strip</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach([
                    'cta_title' => 'CTA Title',
                    'cta_button_1_text' => 'Button 1 Text',
                    'cta_button_1_link' => 'Button 1 Link',
                    'cta_button_2_text' => 'Button 2 Text',
                    'cta_button_2_link' => 'Button 2 Link',
                ] as $field => $label)
                    <div class="field-group">
                        <label class="field-label">{{ $label }}</label>
                        <input type="text" name="{{ $field }}" class="field-input" value="{{ old($field, $jobPage->$field) }}">
                    </div>
                @endforeach

                <div class="field-group">
                    <label class="field-label">CTA Description</label>
                    <textarea name="cta_description" rows="4" class="field-input">{{ old('cta_description', $jobPage->cta_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $jobPage->status) ? 'checked' : '' }}">
                        <input type="checkbox" name="status" value="1" {{ old('status', $jobPage->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Show Job Page</span>
                    </label>
                </div>
            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            Save Job Page
        </button>
    </div>
</form>

@endsection