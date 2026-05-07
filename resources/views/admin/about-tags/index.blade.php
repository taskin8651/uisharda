@extends('layouts.admin')

@section('page-title', 'About Tags')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">About Tags</h2>
        <p class="admin-page-subtitle">Manage mission and vision panel tags</p>
    </div>

    <a href="{{ route('admin.about-tags.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Tag
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Tags</p>
        <p class="stat-value">{{ $tags->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $tags->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $tags->where('status', 0)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Tags</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AboutTag">
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
                @foreach($tags as $tag)
                    <tr>
                        <td><span class="id-text">#{{ $tag->id }}</span></td>
                        <td>{{ $tag->sort_order }}</td>
                        <td>
                            <span class="role-tag">
                                <i class="{{ $tag->icon }}"></i>
                                {{ $tag->icon }}
                            </span>
                        </td>
                        <td><p class="table-main-text">{{ $tag->title }}</p></td>
                        <td>
                            @if($tag->status)
                                <span class="status-pill success">Active</span>
                            @else
                                <span class="status-pill warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.about-tags.edit', $tag->id) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.about-tags.destroy', $tag->id) }}"
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
        $('.datatable-AboutTag').DataTable({
            order: [[1, 'asc']],
            pageLength: 25
        });
    }
});
</script>
@endsection