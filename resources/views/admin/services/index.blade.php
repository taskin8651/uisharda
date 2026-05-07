@extends('layouts.admin')

@section('page-title', 'Services')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Services</h2>
        <p class="admin-page-subtitle">Manage service cards shown on services page</p>
    </div>

    <a href="{{ route('admin.services.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Service
    </a>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Services</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Services">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Icon</th>
                    <th>Tag</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td><span class="id-text">#{{ $service->id }}</span></td>
                        <td>{{ $service->sort_order }}</td>
                        <td><span class="role-tag"><i class="{{ $service->icon }}"></i> {{ $service->icon }}</span></td>
                        <td><span class="role-tag">{{ $service->tag }}</span></td>
                        <td>
                            <p class="table-main-text">{{ $service->title }}</p>
                            <small>{{ \Illuminate\Support\Str::limit($service->description, 70) }}</small>
                        </td>
                        <td>
                            @if($service->status)
                                <span class="status-pill success">Active</span>
                            @else
                                <span class="status-pill warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>

                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-outline btn-outline-danger">
                                        <i class="fas fa-trash-alt"></i> Delete
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
        $('.datatable-Services').DataTable({
            order: [[1, 'asc']],
            pageLength: 25
        });
    }
});
</script>
@endsection