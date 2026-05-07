@extends('layouts.admin')

@section('page-title', 'About Features')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">About Features</h2>
        <p class="admin-page-subtitle">
            Manage story feature cards shown in about page
        </p>
    </div>

    <a href="{{ route('admin.about-features.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Feature
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Features</p>
        <p class="stat-value">{{ $features->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $features->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $features->where('status', 0)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Features</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Feature cards appear below about story text
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AboutFeature">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($features as $feature)
                    <tr>
                        <td><span class="id-text">#{{ $feature->id }}</span></td>
                        <td>{{ $feature->sort_order }}</td>
                        <td>
                            <span class="role-tag">
                                <i class="{{ $feature->icon }}"></i>
                                {{ $feature->icon }}
                            </span>
                        </td>
                        <td>
                            <p class="table-main-text">{{ $feature->title }}</p>
                        </td>
                        <td style="color:#475569;">
                            {{ Str::limit($feature->description, 80) }}
                        </td>
                        <td>
                            @if($feature->status)
                                <span class="status-pill success">
                                    <i class="fas fa-check-circle"></i>
                                    Active
                                </span>
                            @else
                                <span class="status-pill warning">
                                    <i class="fas fa-clock"></i>
                                    Inactive
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.about-features.edit', $feature->id) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.about-features.destroy', $feature->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-outline btn-outline-danger">
                                        <i class="fas fa-trash-alt"></i>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
$(function () {
    if ($.fn.DataTable) {
        $('.datatable-AboutFeature').DataTable({
            order: [[1, 'asc']],
            pageLength: 25
        });
    }
});
</script>
@endsection