@extends('layouts.admin')

@section('page-title', 'Add About Tag')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-tags.index') }}" class="admin-back-link">← Back to list</a>
        <h2 class="admin-page-title">Add About Tag</h2>
        <p class="admin-page-subtitle">Create a new tag for mission and vision panel</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.about-tags.store') }}">
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <div>
                    <p class="form-card-title">Tag Information</p>
                    <p class="form-card-subtitle">Icon, title and display order</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Icon Class</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="icon" class="field-input" value="{{ old('icon') }}" placeholder="bi bi-shield-check">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" required class="field-input" value="{{ old('title') }}" placeholder="Compliance-ready">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', 0) }}">
                    </div>
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
            <i class="fas fa-check"></i>
            Save Tag
        </button>

        <a href="{{ route('admin.about-tags.index') }}" class="btn-ghost">Cancel</a>
    </div>
</form>

@endsection