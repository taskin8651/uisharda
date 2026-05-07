@extends('layouts.admin')

@section('page-title', 'Add About Feature')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-features.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Add About Feature</h2>
        <p class="admin-page-subtitle">
            Create a new feature card for about story section
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.about-features.store') }}">
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-layer-group"></i>
                </div>

                <div>
                    <p class="form-card-title">Feature Information</p>
                    <p class="form-card-subtitle">Icon, title, description and display order</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Icon Class</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="icon" class="field-input"
                               value="{{ old('icon') }}"
                               placeholder="bi bi-patch-check">
                    </div>
                    <p class="field-hint">Bootstrap icon class use karo. Example: bi bi-lightning-charge</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" required class="field-input"
                               value="{{ old('title') }}"
                               placeholder="Verified Profiles">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="description" rows="4" class="field-input"
                              placeholder="Basic screening & shortlisting.">{{ old('description') }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" class="field-input"
                               value="{{ old('sort_order', 0) }}">
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
            Save Feature
        </button>

        <a href="{{ route('admin.about-features.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>
</form>

@endsection