@extends('layouts.admin')

@section('page-title', 'Featured Points')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Featured Points</h2>
        <p class="admin-page-subtitle">Manage bullet points in featured service panel</p>
    </div>

    <a href="{{ route('admin.service-feature-points.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Point
    </a>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Featured Points</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ServiceFeaturePoints">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($points as $point)
                    <tr>
                        <td><span class="id-text">#{{ $point->id }}</span></td>
                        <td>{{ $point->sort_order }}</td>
                        <td><span class="role-tag"><i class="{{ $point->icon }}"></i> {{ $point->icon }}</span></td>
                        <td><p class="table-main-text">{{ $point->title }}</p></td>
                        <td>
                            @if($point->status)
                                <span class="status-pill success">Active</span>
                            @else
                                <span class="status-pill warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.service-feature-points.edit', $point->id) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>

                                <form action="{{ route('admin.service-feature-points.destroy', $point->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
        $('.datatable-ServiceFeaturePoints').DataTable({
            order: [[1, 'asc']],
            pageLength: 25
        });
    }
});
</script>
@endsection