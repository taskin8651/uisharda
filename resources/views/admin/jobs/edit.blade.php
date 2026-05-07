@extends('layouts.admin')

@section('page-title', 'Edit Job')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.jobs.index') }}" class="admin-back-link">← Back to list</a>
        <h2 class="admin-page-title">Edit Job</h2>
        <p class="admin-page-subtitle">Update selected job opening</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.jobs.update', $job->id) }}">
    @csrf
    @method('PUT')

    @include('partials.form', ['job' => $job])

    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i>
                Save Job
            </button>

            <a href="{{ route('admin.jobs.index') }}" class="btn-ghost">Cancel</a>
        </div>

        <button type="submit" form="delete-job-form" class="btn-danger">
            <i class="fas fa-trash-alt"></i>
            Delete
        </button>
    </div>
</form>

<form id="delete-job-form"
      action="{{ route('admin.jobs.destroy', $job->id) }}"
      method="POST"
      onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
    @csrf
    @method('DELETE')
</form>

@endsection