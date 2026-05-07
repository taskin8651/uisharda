@extends('layouts.admin')

@section('page-title', 'Edit Service')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.services.index') }}" class="admin-back-link">← Back to list</a>
        <h2 class="admin-page-title">Edit Service</h2>
        <p class="admin-page-subtitle">Update selected service card</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.services.update', $service->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-edit"></i></div>
                <div>
                    <p class="form-card-title">Service Information</p>
                    <p class="form-card-subtitle">Update service card information</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Icon Class</label>
                    <input type="text" name="icon" class="field-input" value="{{ old('icon', $service->icon) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Tag</label>
                    <input type="text" name="tag" class="field-input" value="{{ old('tag', $service->tag) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <input type="text" name="title" required class="field-input" value="{{ old('title', $service->title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="description" rows="4" class="field-input">{{ old('description', $service->description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Button Text</label>
                    <input type="text" name="button_text" class="field-input" value="{{ old('button_text', $service->button_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Button Link</label>
                    <input type="text" name="button_link" class="field-input" value="{{ old('button_link', $service->button_link) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', $service->sort_order) }}">
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $service->status) ? 'checked' : '' }}">
                        <input type="checkbox" name="status" value="1" {{ old('status', $service->status) ? 'checked' : '' }}>
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
                <i class="fas fa-save"></i> Save Service
            </button>
            <a href="{{ route('admin.services.index') }}" class="btn-ghost">Cancel</a>
        </div>

        <button type="submit" form="delete-service-form" class="btn-danger">
            <i class="fas fa-trash-alt"></i> Delete
        </button>
    </div>
</form>

<form id="delete-service-form" action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
    @csrf
    @method('DELETE')
</form>

@endsection