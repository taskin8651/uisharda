@extends('layouts.admin')

@section('page-title', 'Industry Page')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Industry Page</h2>
        <p class="admin-page-subtitle">
            Manage industry page hero, headings, buttons, process heading and CTA content
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.industry-page.update') }}">
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
                    <input type="text"
                           name="hero_badge_icon"
                           class="field-input"
                           value="{{ old('hero_badge_icon', $industryPage->hero_badge_icon) }}"
                           placeholder="bi bi-buildings">
                </div>

                <div class="field-group">
                    <label class="field-label">Badge Text</label>
                    <input type="text"
                           name="hero_badge_text"
                           class="field-input"
                           value="{{ old('hero_badge_text', $industryPage->hero_badge_text) }}"
                           placeholder="Industries We Serve">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Title</label>
                    <input type="text"
                           name="hero_title"
                           class="field-input"
                           value="{{ old('hero_title', $industryPage->hero_title) }}"
                           placeholder="Role-specific manpower support">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Highlight</label>
                    <input type="text"
                           name="hero_highlight"
                           class="field-input"
                           value="{{ old('hero_highlight', $industryPage->hero_highlight) }}"
                           placeholder="across key industries">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Description</label>
                    <textarea name="hero_description"
                              rows="4"
                              class="field-input"
                              placeholder="Write hero description...">{{ old('hero_description', $industryPage->hero_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Breadcrumb Title</label>
                    <input type="text"
                           name="hero_breadcrumb_title"
                           class="field-input"
                           value="{{ old('hero_breadcrumb_title', $industryPage->hero_breadcrumb_title) }}"
                           placeholder="Industries">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Card Title</label>
                    <input type="text"
                           name="hero_card_title"
                           class="field-input"
                           value="{{ old('hero_card_title', $industryPage->hero_card_title) }}"
                           placeholder="Fast Coordination">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Card Subtitle</label>
                    <input type="text"
                           name="hero_card_subtitle"
                           class="field-input"
                           value="{{ old('hero_card_subtitle', $industryPage->hero_card_subtitle) }}"
                           placeholder="Shortlisting & scheduling support">
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 1 Value</label>
                    <input type="text"
                           name="hero_stat_1_value"
                           class="field-input"
                           value="{{ old('hero_stat_1_value', $industryPage->hero_stat_1_value) }}"
                           placeholder="24–72 hrs">
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 1 Label</label>
                    <input type="text"
                           name="hero_stat_1_label"
                           class="field-input"
                           value="{{ old('hero_stat_1_label', $industryPage->hero_stat_1_label) }}"
                           placeholder="Shortlist time">
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 2 Value</label>
                    <input type="text"
                           name="hero_stat_2_value"
                           class="field-input"
                           value="{{ old('hero_stat_2_value', $industryPage->hero_stat_2_value) }}"
                           placeholder="10+">
                </div>

                <div class="field-group">
                    <label class="field-label">Stat 2 Label</label>
                    <input type="text"
                           name="hero_stat_2_label"
                           class="field-input"
                           value="{{ old('hero_stat_2_label', $industryPage->hero_stat_2_label) }}"
                           placeholder="Sectors">
                </div>

                <div class="field-group">
                    <label class="field-label">Support Title</label>
                    <input type="text"
                           name="hero_support_title"
                           class="field-input"
                           value="{{ old('hero_support_title', $industryPage->hero_support_title) }}"
                           placeholder="Support">
                </div>

                <div class="field-group">
                    <label class="field-label">Support Text</label>
                    <input type="text"
                           name="hero_support_text"
                           class="field-input"
                           value="{{ old('hero_support_text', $industryPage->hero_support_text) }}"
                           placeholder="Dedicated follow-ups for joining.">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Button Text</label>
                    <input type="text"
                           name="hero_button_text"
                           class="field-input"
                           value="{{ old('hero_button_text', $industryPage->hero_button_text) }}"
                           placeholder="Share Requirement">
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Button Link</label>
                    <input type="text"
                           name="hero_button_link"
                           class="field-input"
                           value="{{ old('hero_button_link', $industryPage->hero_button_link) }}"
                           placeholder="/#contact">
                </div>

            </div>
        </div>

        {{-- GRID SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-th-large"></i>
                </div>
                <div>
                    <p class="form-card-title">Industry Grid Section</p>
                    <p class="form-card-subtitle">Top industry cards heading and buttons</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Eyebrow</label>
                    <input type="text"
                           name="grid_eyebrow"
                           class="field-input"
                           value="{{ old('grid_eyebrow', $industryPage->grid_eyebrow) }}"
                           placeholder="Explore">
                </div>

                <div class="field-group">
                    <label class="field-label">Title</label>
                    <input type="text"
                           name="grid_title"
                           class="field-input"
                           value="{{ old('grid_title', $industryPage->grid_title) }}"
                           placeholder="Industries at a glance">
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="grid_description"
                              rows="4"
                              class="field-input">{{ old('grid_description', $industryPage->grid_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Button 1 Text</label>
                    <input type="text"
                           name="grid_button_1_text"
                           class="field-input"
                           value="{{ old('grid_button_1_text', $industryPage->grid_button_1_text) }}"
                           placeholder="View Services">
                </div>

                <div class="field-group">
                    <label class="field-label">Button 1 Link</label>
                    <input type="text"
                           name="grid_button_1_link"
                           class="field-input"
                           value="{{ old('grid_button_1_link', $industryPage->grid_button_1_link) }}"
                           placeholder="/services">
                </div>

                <div class="field-group">
                    <label class="field-label">Button 2 Text</label>
                    <input type="text"
                           name="grid_button_2_text"
                           class="field-input"
                           value="{{ old('grid_button_2_text', $industryPage->grid_button_2_text) }}"
                           placeholder="Get Quote">
                </div>

                <div class="field-group">
                    <label class="field-label">Button 2 Link</label>
                    <input type="text"
                           name="grid_button_2_link"
                           class="field-input"
                           value="{{ old('grid_button_2_link', $industryPage->grid_button_2_link) }}"
                           placeholder="/#contact">
                </div>
            </div>
        </div>

        {{-- DETAIL SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-list-alt"></i>
                </div>
                <div>
                    <p class="form-card-title">Industry Detail Section</p>
                    <p class="form-card-subtitle">Heading above industry detail blocks</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Eyebrow</label>
                    <input type="text"
                           name="detail_eyebrow"
                           class="field-input"
                           value="{{ old('detail_eyebrow', $industryPage->detail_eyebrow) }}"
                           placeholder="Details">
                </div>

                <div class="field-group">
                    <label class="field-label">Title</label>
                    <input type="text"
                           name="detail_title"
                           class="field-input"
                           value="{{ old('detail_title', $industryPage->detail_title) }}"
                           placeholder="Roles & manpower support by industry">
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="detail_description"
                              rows="4"
                              class="field-input">{{ old('detail_description', $industryPage->detail_description) }}</textarea>
                </div>
            </div>
        </div>

        {{-- PROCESS SECTION --}}
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
                    <input type="text"
                           name="process_eyebrow"
                           class="field-input"
                           value="{{ old('process_eyebrow', $industryPage->process_eyebrow) }}"
                           placeholder="Process">
                </div>

                <div class="field-group">
                    <label class="field-label">Title</label>
                    <input type="text"
                           name="process_title"
                           class="field-input"
                           value="{{ old('process_title', $industryPage->process_title) }}"
                           placeholder="How it works">
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="process_description"
                              rows="4"
                              class="field-input">{{ old('process_description', $industryPage->process_description) }}</textarea>
                </div>
            </div>
        </div>

        {{-- CTA SECTION --}}
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
                    <input type="text"
                           name="cta_title"
                           class="field-input"
                           value="{{ old('cta_title', $industryPage->cta_title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">CTA Description</label>
                    <textarea name="cta_description"
                              rows="4"
                              class="field-input">{{ old('cta_description', $industryPage->cta_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Button 1 Text</label>
                    <input type="text"
                           name="cta_button_1_text"
                           class="field-input"
                           value="{{ old('cta_button_1_text', $industryPage->cta_button_1_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Button 1 Link</label>
                    <input type="text"
                           name="cta_button_1_link"
                           class="field-input"
                           value="{{ old('cta_button_1_link', $industryPage->cta_button_1_link) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Button 2 Text</label>
                    <input type="text"
                           name="cta_button_2_text"
                           class="field-input"
                           value="{{ old('cta_button_2_text', $industryPage->cta_button_2_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Button 2 Link</label>
                    <input type="text"
                           name="cta_button_2_link"
                           class="field-input"
                           value="{{ old('cta_button_2_link', $industryPage->cta_button_2_link) }}">
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $industryPage->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               {{ old('status', $industryPage->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Show Industry Page</span>
                    </label>
                </div>
            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            Save Industry Page
        </button>
    </div>
</form>

@endsection