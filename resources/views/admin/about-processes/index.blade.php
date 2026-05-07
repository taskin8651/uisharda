@extends('layouts.admin')

@section('page-title', 'About Processes')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">About Processes</h2>
        <p class="admin-page-subtitle">Manage how we work process cards</p>
    </div>

    <a href="{{ route('admin.about-processes.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Process
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Steps</p>
        <p class="stat-value">{{ $processes->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $processes->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $processes->where('status', 0)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Process Steps</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AboutProcess">
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
                @foreach($processes as $process)
                    <tr>
                        <td><span class="id-text">#{{ $process->id }}</span></td>
                        <td>{{ $process->sort_order }}</td>
                        <td>
                            <span class="role-tag">
                                <i class="{{ $process->icon }}"></i>
                                {{ $process->icon }}
                            </span>
                        </td>
                        <td><p class="table-main-text">{{ $process->title }}</p></td>
                        <td style="color:#475569;">{{ Str::limit($process->description, 80) }}</td>
                        <td>
                            @if($process->status)
                                <span class="status-pill success">Active</span>
                            @else
                                <span class="status-pill warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.about-processes.edit', $process->id) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.about-processes.destroy', $process->id) }}"
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
        $('.datatable-AboutProcess').DataTable({
            order: [[1, 'asc']],
            pageLength: 25
        });
    }
});
</script>
@endsection