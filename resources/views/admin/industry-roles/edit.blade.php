@extends('layouts.admin')

@section('page-title', 'Edit Industry Role')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.industry-roles.index') }}" class="admin-back-link">← Back to list</a>
        <h2 class="admin-page-title">Edit Industry Role</h2>
        <p class="admin-page-subtitle">Update selected industry role chip</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.industry-roles.update', $industryRole->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <div>
                    <p class="form-card-title">Role Information</p>
                    <p class="form-card-subtitle">Update industry role chip</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Industry <span class="req">*</span></label>
                    <select name="industry_id" class="field-input" required>
                        <option value="">Select Industry</option>
                        @foreach($industries as $industry)
                            <option value="{{ $industry->id }}" {{ old('industry_id', $industryRole->industry_id) == $industry->id ? 'selected' : '' }}>
                                {{ $industry->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="field-group">
                    <label class="field-label">Icon Class</label>
                    <input type="text" name="icon" class="field-input" value="{{ old('icon', $industryRole->icon) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <input type="text" name="title" required class="field-input" value="{{ old('title', $industryRole->title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', $industryRole->sort_order) }}">
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $industryRole->status) ? 'checked' : '' }}">
                        <input type="checkbox" name="status" value="1" {{ old('status', $industryRole->status) ? 'checked' : '' }}>
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
                Save Role
            </button>

            <a href="{{ route('admin.industry-roles.index') }}" class="btn-ghost">Cancel</a>
        </div>

        <button type="submit" form="delete-role-form" class="btn-danger">
            <i class="fas fa-trash-alt"></i>
            Delete
        </button>
    </div>
</form>

<form id="delete-role-form"
      action="{{ route('admin.industry-roles.destroy', $industryRole->id) }}"
      method="POST"
      onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
    @csrf
    @method('DELETE')
</form>

@endsection