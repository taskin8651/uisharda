@extends('layouts.admin')

@section('page-title', 'Edit Contact FAQ')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.contact-faqs.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Edit Contact FAQ</h2>
        <p class="admin-page-subtitle">
            Update selected contact page FAQ
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.contact-faqs.update', $contactFaq->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-edit"></i>
                </div>

                <div>
                    <p class="form-card-title">FAQ Information</p>
                    <p class="form-card-subtitle">
                        Update question, answer, display order and status
                    </p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">
                        Question <span class="req">*</span>
                    </label>

                    <input type="text"
                           name="question"
                           class="field-input {{ $errors->has('question') ? 'is-invalid' : '' }}"
                           value="{{ old('question', $contactFaq->question) }}"
                           placeholder="How fast will you respond?"
                           required>

                    @if($errors->has('question'))
                        <div class="invalid-feedback">
                            {{ $errors->first('question') }}
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Answer <span class="req">*</span>
                    </label>

                    <textarea name="answer"
                              rows="6"
                              class="field-input {{ $errors->has('answer') ? 'is-invalid' : '' }}"
                              placeholder="Write answer here..."
                              required>{{ old('answer', $contactFaq->answer) }}</textarea>

                    @if($errors->has('answer'))
                        <div class="invalid-feedback">
                            {{ $errors->first('answer') }}
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Sort Order</label>

                    <input type="number"
                           name="sort_order"
                           class="field-input {{ $errors->has('sort_order') ? 'is-invalid' : '' }}"
                           value="{{ old('sort_order', $contactFaq->sort_order) }}"
                           placeholder="0">

                    @if($errors->has('sort_order'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sort_order') }}
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $contactFaq->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               {{ old('status', $contactFaq->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i>
                Save FAQ
            </button>

            <a href="{{ route('admin.contact-faqs.index') }}" class="btn-ghost">
                Cancel
            </a>
        </div>

        @can('contact_faq_delete')
            <button type="submit" form="delete-contact-faq-form" class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete
            </button>
        @endcan
    </div>
</form>

<form id="delete-contact-faq-form"
      action="{{ route('admin.contact-faqs.destroy', $contactFaq->id) }}"
      method="POST"
      onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
    @csrf
    @method('DELETE')
</form>

@endsection