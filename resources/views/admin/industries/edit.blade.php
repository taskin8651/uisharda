@extends('layouts.admin')

@section('page-title', 'Edit Industry')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.industries.index') }}" class="admin-back-link">← Back to list</a>
        <h2 class="admin-page-title">Edit Industry</h2>
        <p class="admin-page-subtitle">Update industry grid card and detail block</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.industries.update', $industry->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-th-large"></i>
                </div>
                <div>
                    <p class="form-card-title">Grid Card Information</p>
                    <p class="form-card-subtitle">Top industry card content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Icon Class</label>
                    <input type="text" name="icon" class="field-input" value="{{ old('icon', $industry->icon) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <input type="text" name="title" required class="field-input" value="{{ old('title', $industry->title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Slug</label>
                    <input type="text" name="slug" class="field-input" value="{{ old('slug', $industry->slug) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Subtitle</label>
                    <input type="text" name="subtitle" class="field-input" value="{{ old('subtitle', $industry->subtitle) }}">
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-list-alt"></i>
                </div>
                <div>
                    <p class="form-card-title">Detail Block</p>
                    <p class="form-card-subtitle">Industry detail section content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Badge Icon</label>
                    <input type="text" name="detail_badge_icon" class="field-input" value="{{ old('detail_badge_icon', $industry->detail_badge_icon) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Badge Text</label>
                    <input type="text" name="detail_badge_text" class="field-input" value="{{ old('detail_badge_text', $industry->detail_badge_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Chip Icon</label>
                    <input type="text" name="detail_chip_icon" class="field-input" value="{{ old('detail_chip_icon', $industry->detail_chip_icon) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Chip Text</label>
                    <input type="text" name="detail_chip_text" class="field-input" value="{{ old('detail_chip_text', $industry->detail_chip_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Detail Title</label>
                    <input type="text" name="detail_title" class="field-input" value="{{ old('detail_title', $industry->detail_title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Detail Description</label>
                    <textarea name="detail_description" rows="5" class="field-input">{{ old('detail_description', $industry->detail_description) }}</textarea>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-link"></i>
                </div>
                <div>
                    <p class="form-card-title">Buttons & Settings</p>
                    <p class="form-card-subtitle">CTA buttons, order and status</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Button Text</label>
                    <input type="text" name="button_text" class="field-input" value="{{ old('button_text', $industry->button_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Button Link</label>
                    <input type="text" name="button_link" class="field-input" value="{{ old('button_link', $industry->button_link) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Job Button Text</label>
                    <input type="text" name="job_button_text" class="field-input" value="{{ old('job_button_text', $industry->job_button_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Job Button Link</label>
                    <input type="text" name="job_button_link" class="field-input" value="{{ old('job_button_link', $industry->job_button_link) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', $industry->sort_order) }}">
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('is_special', $industry->is_special) ? 'checked' : '' }}">
                        <input type="checkbox" name="is_special" value="1" {{ old('is_special', $industry->is_special) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Special Highlight Card</span>
                    </label>
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $industry->status) ? 'checked' : '' }}">
                        <input type="checkbox" name="status" value="1" {{ old('status', $industry->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                </div>
            </div>
        </div>

    </div>

    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i>
                Save Industry
            </button>

            <a href="{{ route('admin.industries.index') }}" class="btn-ghost">Cancel</a>
        </div>

        <button type="submit" form="delete-industry-form" class="btn-danger">
            <i class="fas fa-trash-alt"></i>
            Delete
        </button>
    </div>
</form>

<form id="delete-industry-form"
      action="{{ route('admin.industries.destroy', $industry->id) }}"
      method="POST"
      onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
    @csrf
    @method('DELETE')
</form>

@endsection