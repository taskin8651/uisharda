@extends('layouts.admin')

@section('page-title', 'Contact Inquiry Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.contact-inquiries.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Contact Inquiry Details</h2>
        <p class="admin-page-subtitle">
            View and update inquiry status
        </p>
    </div>
</div>

<div class="admin-form-grid">

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-user"></i>
            </div>
            <div>
                <p class="form-card-title">User Details</p>
                <p class="form-card-subtitle">Candidate or employer information</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="detail-row">
                <div class="detail-label">Name</div>
                <div class="detail-value">{{ $contactInquiry->full_name }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Mobile</div>
                <div class="detail-value">{{ $contactInquiry->mobile_number }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Email</div>
                <div class="detail-value">{{ $contactInquiry->email ?? '-' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">User Type</div>
                <div class="detail-value">{{ $contactInquiry->user_type }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Location</div>
                <div class="detail-value">{{ $contactInquiry->preferred_location ?? '-' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Industry</div>
                <div class="detail-value">{{ $contactInquiry->industry ?? '-' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Resume</div>
                <div class="detail-value">
                    @if($contactInquiry->resume_url)
                        <a href="{{ $contactInquiry->resume_url }}" target="_blank" class="btn-outline btn-outline-edit">
                            <i class="fas fa-file-download"></i>
                            View Resume
                        </a>
                    @else
                        -
                    @endif
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Submitted At</div>
                <div class="detail-value">
                    {{ $contactInquiry->created_at ? $contactInquiry->created_at->format('d M Y, h:i A') : '-' }}
                </div>
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-comment-dots"></i>
            </div>
            <div>
                <p class="form-card-title">Message</p>
                <p class="form-card-subtitle">Requirement or job application message</p>
            </div>
        </div>

        <div class="form-card-body">
            <p class="detail-value" style="line-height:1.8;">
                {{ $contactInquiry->message }}
            </p>
        </div>
    </div>

    @can('contact_inquiry_edit')
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <div>
                    <p class="form-card-title">Admin Update</p>
                    <p class="form-card-subtitle">Update inquiry status and internal note</p>
                </div>
            </div>

            <div class="form-card-body">
                <form method="POST" action="{{ route('admin.contact-inquiries.update', $contactInquiry->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="field-group">
                        <label class="field-label">Status</label>
                        <select name="status" class="field-input">
                            <option value="new" {{ $contactInquiry->status == 'new' ? 'selected' : '' }}>New</option>
                            <option value="contacted" {{ $contactInquiry->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="closed" {{ $contactInquiry->status == 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>

                    <div class="field-group">
                        <label class="field-label">Admin Note</label>
                        <textarea name="admin_note" rows="5" class="field-input">{{ old('admin_note', $contactInquiry->admin_note) }}</textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-save"></i>
                            Update Inquiry
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endcan

</div>

@endsection