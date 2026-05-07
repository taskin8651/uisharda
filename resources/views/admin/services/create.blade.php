@extends('layouts.admin')

@section('page-title', 'Add Service')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.services.index') }}" class="admin-back-link">← Back to list</a>
        <h2 class="admin-page-title">Add Service</h2>
        <p class="admin-page-subtitle">Create a new service card</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.services.store') }}">
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-layer-group"></i></div>
                <div>
                    <p class="form-card-title">Service Information</p>
                    <p class="form-card-subtitle">Icon, tag, title and CTA link</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Icon Class</label>
                    <input type="text" name="icon" class="field-input" value="{{ old('icon') }}" placeholder="bi bi-person-badge">
                </div>

                <div class="field-group">
                    <label class="field-label">Tag</label>
                    <input type="text" name="tag" class="field-input" value="{{ old('tag') }}" placeholder="Recruitment">
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <input type="text" name="title" required class="field-input" value="{{ old('title') }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="description" rows="4" class="field-input">{{ old('description') }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Button Text</label>
                    <input type="text" name="button_text" class="field-input" value="{{ old('button_text') }}" placeholder="Get candidates">
                </div>

                <div class="field-group">
                    <label class="field-label">Button Link</label>
                    <input type="text" name="button_link" class="field-input" value="{{ old('button_link', '/#contact') }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', 0) }}">
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item checked">
                        <input type="checkbox" name="status" value="1" checked>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i> Save Service
        </button>
        <a href="{{ route('admin.services.index') }}" class="btn-ghost">Cancel</a>
    </div>
</form>

@endsection