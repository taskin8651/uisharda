@extends('layouts.admin')

@section('page-title', 'Contact FAQs')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Contact FAQs</h2>
        <p class="admin-page-subtitle">
            Manage quick FAQ accordion shown on contact page
        </p>
    </div>

    @can('contact_faq_create')
        <a href="{{ route('admin.contact-faqs.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add FAQ
        </a>
    @endcan
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All FAQs</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ContactFaqs">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($faqs as $faq)
                    <tr>
                        <td><span class="id-text">#{{ $faq->id }}</span></td>
                        <td>{{ $faq->sort_order }}</td>
                        <td>
                            <p class="table-main-text">{{ $faq->question }}</p>
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit($faq->answer, 80) }}</td>
                        <td>
                            @if($faq->status)
                                <span class="status-pill success">Active</span>
                            @else
                                <span class="status-pill warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                @can('contact_faq_edit')
                                    <a href="{{ route('admin.contact-faqs.edit', $faq->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('contact_faq_delete')
                                    <form action="{{ route('admin.contact-faqs.destroy', $faq->id) }}"
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
        $('.datatable-ContactFaqs').DataTable({
            order: [[1, 'asc']],
            pageLength: 25
        });
    }
});
</script>
@endsection