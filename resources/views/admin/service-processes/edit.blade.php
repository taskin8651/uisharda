@extends('layouts.admin')

@section('page-title', 'Edit Service Process')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.service-processes.index') }}" class="admin-back-link">← Back to list</a>
        <h2 class="admin-page-title">Edit Service Process</h2>
        <p class="admin-page-subtitle">Update selected process card</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.service-processes.update', $serviceProcess->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-edit"></i></div>
                <div>
                    <p class="form-card-title">Process Information</p>
                    <p class="form-card-subtitle">Update icon, title, description and settings</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Icon Class</label>
                    <input type="text" name="icon" class="field-input" value="{{ old('icon', $serviceProcess->icon) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <input type="text" name="title" required class="field-input" value="{{ old('title', $serviceProcess->title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="description" rows="4" class="field-input">{{ old('description', $serviceProcess->description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', $serviceProcess->sort_order) }}">
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('is_special', $serviceProcess->is_special) ? 'checked' : '' }}">
                        <input type="checkbox" name="is_special" value="1" {{ old('is_special', $serviceProcess->is_special) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Special Highlight Card</span>
                    </label>
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $serviceProcess->status) ? 'checked' : '' }}">
                        <input type="checkbox" name="status" value="1" {{ old('status', $serviceProcess->status) ? 'checked' : '' }}>
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
                <i class="fas fa-save"></i> Save Process
            </button>
            <a href="{{ route('admin.service-processes.index') }}" class="btn-ghost">Cancel</a>
        </div>

        <button type="submit" form="delete-process-form" class="btn-danger">
            <i class="fas fa-trash-alt"></i> Delete
        </button>
    </div>
</form>

<form id="delete-process-form" action="{{ route('admin.service-processes.destroy', $serviceProcess->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
    @csrf
    @method('DELETE')
</form>

@endsection