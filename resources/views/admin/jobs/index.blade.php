@extends('layouts.admin')

@section('page-title', 'Jobs')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Jobs</h2>
        <p class="admin-page-subtitle">Manage job openings and modal details</p>
    </div>

    <a href="{{ route('admin.jobs.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Job
    </a>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Jobs</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Jobs">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Industry</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td><span class="id-text">#{{ $job->id }}</span></td>
                        <td>{{ $job->sort_order }}</td>
                        <td>
                            <p class="table-main-text">{{ $job->title }}</p>
                            <small>{{ $job->salary }} • {{ $job->posted_text }}</small>
                        </td>
                        <td>{{ $job->job_type }}</td>
                        <td>{{ $job->location }}</td>
                        <td>{{ $job->industry }}</td>
                        <td>
                            @if($job->status)
                                <span class="status-pill success">Active</span>
                            @else
                                <span class="status-pill warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.jobs.destroy', $job->id) }}"
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
        $('.datatable-Jobs').DataTable({
            order: [[1, 'asc']],
            pageLength: 25
        });
    }
});
</script>
@endsection