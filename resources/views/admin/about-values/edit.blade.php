@extends('layouts.admin')

@section('page-title', 'Edit About Value')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-values.index') }}" class="admin-back-link">← Back to list</a>
        <h2 class="admin-page-title">Edit About Value</h2>
        <p class="admin-page-subtitle">Update selected value card</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.about-values.update', $aboutValue->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <div>
                    <p class="form-card-title">Value Information</p>
                    <p class="form-card-subtitle">Update icon, tag, title and status</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Icon Class</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="icon" class="field-input" value="{{ old('icon', $aboutValue->icon) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Tag</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="tag" class="field-input" value="{{ old('tag', $aboutValue->tag) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" required class="field-input" value="{{ old('title', $aboutValue->title) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="description" rows="4" class="field-input">{{ old('description', $aboutValue->description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', $aboutValue->sort_order) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $aboutValue->status) ? 'checked' : '' }}">
                        <input type="checkbox" name="status" value="1" {{ old('status', $aboutValue->status) ? 'checked' : '' }}>
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
                Save Value
            </button>

            <a href="{{ route('admin.about-values.index') }}" class="btn-ghost">Cancel</a>
        </div>

        <button type="submit" form="delete-value-form" class="btn-danger">
            <i class="fas fa-trash-alt"></i>
            Delete
        </button>
    </div>
</form>

<form id="delete-value-form"
      action="{{ route('admin.about-values.destroy', $aboutValue->id) }}"
      method="POST"
      onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
    @csrf
    @method('DELETE')
</form>

@endsection