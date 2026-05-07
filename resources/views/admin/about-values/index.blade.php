@extends('layouts.admin')

@section('page-title', 'About Values')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">About Values</h2>
        <p class="admin-page-subtitle">Manage value cards shown in about page</p>
    </div>

    <a href="{{ route('admin.about-values.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Value
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Values</p>
        <p class="stat-value">{{ $values->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $values->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $values->where('status', 0)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Values</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AboutValue">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Icon</th>
                    <th>Tag</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($values as $value)
                    <tr>
                        <td><span class="id-text">#{{ $value->id }}</span></td>
                        <td>{{ $value->sort_order }}</td>
                        <td>
                            <span class="role-tag">
                                <i class="{{ $value->icon }}"></i>
                                {{ $value->icon }}
                            </span>
                        </td>
                        <td><span class="role-tag">{{ $value->tag }}</span></td>
                        <td><p class="table-main-text">{{ $value->title }}</p></td>
                        <td style="color:#475569;">{{ Str::limit($value->description, 70) }}</td>
                        <td>
                            @if($value->status)
                                <span class="status-pill success">Active</span>
                            @else
                                <span class="status-pill warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.about-values.edit', $value->id) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.about-values.destroy', $value->id) }}"
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
        $('.datatable-AboutValue').DataTable({
            order: [[1, 'asc']],
            pageLength: 25
        });
    }
});
</script>
@endsection