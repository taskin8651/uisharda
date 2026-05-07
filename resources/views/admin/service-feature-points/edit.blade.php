@extends('layouts.admin')

@section('page-title', 'Edit Featured Point')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.service-feature-points.index') }}" class="admin-back-link">← Back to list</a>
        <h2 class="admin-page-title">Edit Featured Point</h2>
        <p class="admin-page-subtitle">Update selected featured point</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.service-feature-points.update', $serviceFeaturePoint->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-edit"></i></div>
                <div>
                    <p class="form-card-title">Point Information</p>
                    <p class="form-card-subtitle">Update point information</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Icon Class</label>
                    <input type="text" name="icon" class="field-input" value="{{ old('icon', $serviceFeaturePoint->icon) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <input type="text" name="title" required class="field-input" value="{{ old('title', $serviceFeaturePoint->title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', $serviceFeaturePoint->sort_order) }}">
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $serviceFeaturePoint->status) ? 'checked' : '' }}">
                        <input type="checkbox" name="status" value="1" {{ old('status', $serviceFeaturePoint->status) ? 'checked' : '' }}>
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
                <i class="fas fa-save"></i> Save Point
            </button>
            <a href="{{ route('admin.service-feature-points.index') }}" class="btn-ghost">Cancel</a>
        </div>

        <button type="submit" form="delete-point-form" class="btn-danger">
            <i class="fas fa-trash-alt"></i> Delete
        </button>
    </div>
</form>

<form id="delete-point-form" action="{{ route('admin.service-feature-points.destroy', $serviceFeaturePoint->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
    @csrf
    @method('DELETE')
</form>

@endsection