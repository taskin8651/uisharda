@extends('layouts.admin')

@section('page-title', 'Add Featured Point')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.service-feature-points.index') }}" class="admin-back-link">← Back to list</a>
        <h2 class="admin-page-title">Add Featured Point</h2>
        <p class="admin-page-subtitle">Create a bullet point for featured service panel</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.service-feature-points.store') }}">
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-check-circle"></i></div>
                <div>
                    <p class="form-card-title">Point Information</p>
                    <p class="form-card-subtitle">Icon, title and display order</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Icon Class</label>
                    <input type="text" name="icon" class="field-input" value="{{ old('icon', 'bi bi-check2-circle') }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <input type="text" name="title" required class="field-input" value="{{ old('title') }}">
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
            <i class="fas fa-check"></i> Save Point
        </button>
        <a href="{{ route('admin.service-feature-points.index') }}" class="btn-ghost">Cancel</a>
    </div>
</form>

@endsection