@extends('layouts.admin')

@section('page-title', 'Industry Roles')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Industry Roles</h2>
        <p class="admin-page-subtitle">Manage role chips inside each industry detail block</p>
    </div>

    <a href="{{ route('admin.industry-roles.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Role
    </a>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Industry Roles</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-IndustryRoles">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Industry</th>
                    <th>Order</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td><span class="id-text">#{{ $role->id }}</span></td>
                        <td>{{ $role->industry->title ?? '-' }}</td>
                        <td>{{ $role->sort_order }}</td>
                        <td>
                            <span class="role-tag">
                                <i class="{{ $role->icon }}"></i>
                                {{ $role->icon }}
                            </span>
                        </td>
                        <td><p class="table-main-text">{{ $role->title }}</p></td>
                        <td>
                            @if($role->status)
                                <span class="status-pill success">Active</span>
                            @else
                                <span class="status-pill warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.industry-roles.edit', $role->id) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.industry-roles.destroy', $role->id) }}"
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
        $('.datatable-IndustryRoles').DataTable({
            order: [[2, 'asc']],
            pageLength: 25
        });
    }
});
</script>
@endsection