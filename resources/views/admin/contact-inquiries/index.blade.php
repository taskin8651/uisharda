@extends('layouts.admin')

@section('page-title', 'Contact Inquiries')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Contact Inquiries</h2>
        <p class="admin-page-subtitle">
            Manage candidate applications and company requirements
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Inquiries</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ContactInquiries">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Type</th>
                    <th>Industry</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($inquiries as $inquiry)
                    <tr>
                        <td><span class="id-text">#{{ $inquiry->id }}</span></td>
                        <td>
                            <p class="table-main-text">{{ $inquiry->full_name }}</p>
                            <small>{{ $inquiry->email }}</small>
                        </td>
                        <td>{{ $inquiry->mobile_number }}</td>
                        <td>{{ $inquiry->user_type }}</td>
                        <td>{{ $inquiry->industry ?? '-' }}</td>
                        <td>
                            @if($inquiry->status == 'new')
                                <span class="status-pill warning">New</span>
                            @elseif($inquiry->status == 'contacted')
                                <span class="status-pill success">Contacted</span>
                            @else
                                <span class="status-pill">{{ ucfirst($inquiry->status) }}</span>
                            @endif
                        </td>
                        <td>{{ $inquiry->created_at ? $inquiry->created_at->format('d M Y') : '-' }}</td>
                        <td>
                            <div class="action-row">
                                @can('contact_inquiry_show')
                                    <a href="{{ route('admin.contact-inquiries.show', $inquiry->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('contact_inquiry_delete')
                                    <form action="{{ route('admin.contact-inquiries.destroy', $inquiry->id) }}"
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
                                @endcan
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
        $('.datatable-ContactInquiries').DataTable({
            order: [[0, 'desc']],
            pageLength: 25
        });
    }
});
</script>
@endsection