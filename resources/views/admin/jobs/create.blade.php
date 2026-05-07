@extends('layouts.admin')

@section('page-title', 'Add Job')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.jobs.index') }}" class="admin-back-link">← Back to list</a>
        <h2 class="admin-page-title">Add Job</h2>
        <p class="admin-page-subtitle">Create a new job opening</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.jobs.store') }}">
    @csrf

    @include('partials.form', ['job' => null])

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save Job
        </button>

        <a href="{{ route('admin.jobs.index') }}" class="btn-ghost">Cancel</a>
    </div>
</form>

@endsection