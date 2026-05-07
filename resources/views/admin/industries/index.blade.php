@extends('layouts.admin')

@section('page-title', 'Industries')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Industries</h2>
        <p class="admin-page-subtitle">Manage industry grid cards and detail blocks</p>
    </div>

    <a href="{{ route('admin.industries.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Industry
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Industries</p>
        <p class="stat-value">{{ $industries->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $industries->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $industries->where('status', 0)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Industries</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Industries">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Roles</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($industries as $industry)
                    <tr>
                        <td><span class="id-text">#{{ $industry->id }}</span></td>
                        <td>{{ $industry->sort_order }}</td>
                        <td>
                            <span class="role-tag">
                                <i class="{{ $industry->icon }}"></i>
                                {{ $industry->icon }}
                            </span>
                        </td>
                        <td>
                            <p class="table-main-text">{{ $industry->title }}</p>
                            <small>{{ $industry->subtitle }}</small>
                        </td>
                        <td>{{ $industry->slug }}</td>
                        <td>{{ $industry->roles_count }}</td>
                        <td>
                            @if($industry->status)
                                <span class="status-pill success">Active</span>
                            @else
                                <span class="status-pill warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.industries.edit', $industry->id) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.industries.destroy', $industry->id) }}"
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
        $('.datatable-Industries').DataTable({
            order: [[1, 'asc']],
            pageLength: 25
        });
    }
});
</script>
@endsection