@extends('layouts.admin')

@section('page-title', 'Add Industry Role')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.industry-roles.index') }}" class="admin-back-link">← Back to list</a>
        <h2 class="admin-page-title">Add Industry Role</h2>
        <p class="admin-page-subtitle">Create a role chip for industry detail section</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.industry-roles.store') }}">
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-user-tag"></i>
                </div>
                <div>
                    <p class="form-card-title">Role Information</p>
                    <p class="form-card-subtitle">Select industry and add chip content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Industry <span class="req">*</span></label>
                    <select name="industry_id" class="field-input" required>
                        <option value="">Select Industry</option>
                        @foreach($industries as $industry)
                            <option value="{{ $industry->id }}" {{ old('industry_id') == $industry->id ? 'selected' : '' }}>
                                {{ $industry->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="field-group">
                    <label class="field-label">Icon Class</label>
                    <input type="text" name="icon" class="field-input" value="{{ old('icon') }}" placeholder="bi bi-person-check">
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <input type="text" name="title" required class="field-input" value="{{ old('title') }}" placeholder="Operators">
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
            <i class="fas fa-check"></i>
            Save Role
        </button>

        <a href="{{ route('admin.industry-roles.index') }}" class="btn-ghost">Cancel</a>
    </div>
</form>

@endsection