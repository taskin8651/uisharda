<div class="admin-form-grid">

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-briefcase"></i></div>
            <div>
                <p class="form-card-title">Job Card Information</p>
                <p class="form-card-subtitle">Basic job details shown on frontend card</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Job Type Icon</label>
                <input type="text" name="job_type_icon" class="field-input" value="{{ old('job_type_icon', $job->job_type_icon ?? 'bi bi-briefcase') }}">
            </div>

            <div class="field-group">
                <label class="field-label">Job Type</label>
                <input type="text" name="job_type" class="field-input" value="{{ old('job_type', $job->job_type ?? '') }}" placeholder="Full-time">
            </div>

            <div class="field-group">
                <label class="field-label">Location</label>
                <input type="text" name="location" class="field-input" value="{{ old('location', $job->location ?? '') }}" placeholder="Noida">
            </div>

            <div class="field-group">
                <label class="field-label">Job Title <span class="req">*</span></label>
                <input type="text" name="title" required class="field-input" value="{{ old('title', $job->title ?? '') }}">
            </div>

            <div class="field-group">
                <label class="field-label">Industry</label>
                <input type="text" name="industry" class="field-input" value="{{ old('industry', $job->industry ?? '') }}" placeholder="Logistics">
            </div>

            <div class="field-group">
                <label class="field-label">Experience</label>
                <input type="text" name="experience" class="field-input" value="{{ old('experience', $job->experience ?? '') }}" placeholder="0–2 yrs">
            </div>

            <div class="field-group">
                <label class="field-label">Skills</label>
                <input type="text" name="skills" class="field-input" value="{{ old('skills', $job->skills ?? '') }}" placeholder="Tally/Excel">
            </div>

            <div class="field-group">
                <label class="field-label">Salary</label>
                <input type="text" name="salary" class="field-input" value="{{ old('salary', $job->salary ?? '') }}" placeholder="18k–25k">
            </div>

            <div class="field-group">
                <label class="field-label">Posted Text</label>
                <input type="text" name="posted_text" class="field-input" value="{{ old('posted_text', $job->posted_text ?? '') }}" placeholder="Posted: 2 days ago">
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-list-alt"></i></div>
            <div>
                <p class="form-card-title">Modal Details</p>
                <p class="form-card-subtitle">Responsibilities, requirements and apply info</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Responsibilities</label>
                <textarea name="responsibilities" rows="6" class="field-input">{{ old('responsibilities', $job->responsibilities ?? '') }}</textarea>
                <p class="field-hint">One responsibility per line</p>
            </div>

            <div class="field-group">
                <label class="field-label">Requirements</label>
                <textarea name="requirements" rows="6" class="field-input">{{ old('requirements', $job->requirements ?? '') }}</textarea>
                <p class="field-hint">One requirement per line</p>
            </div>

            <div class="field-group">
                <label class="field-label">How To Apply Title</label>
                <input type="text" name="how_to_apply_title" class="field-input" value="{{ old('how_to_apply_title', $job->how_to_apply_title ?? 'How to apply') }}">
            </div>

            <div class="field-group">
                <label class="field-label">How To Apply Text</label>
                <textarea name="how_to_apply_text" rows="4" class="field-input">{{ old('how_to_apply_text', $job->how_to_apply_text ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-cog"></i></div>
            <div>
                <p class="form-card-title">Button & Settings</p>
                <p class="form-card-subtitle">Apply button, order and status</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Apply Button Text</label>
                <input type="text" name="apply_button_text" class="field-input" value="{{ old('apply_button_text', $job->apply_button_text ?? 'Apply') }}">
            </div>

            <div class="field-group">
                <label class="field-label">Apply Link</label>
                <input type="text" name="apply_link" class="field-input" value="{{ old('apply_link', $job->apply_link ?? '/#contact') }}">
            </div>

            <div class="field-group">
                <label class="field-label">Sort Order</label>
                <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', $job->sort_order ?? 0) }}">
            </div>

            <div class="field-group">
                <label class="role-checkbox-item {{ old('status', $job->status ?? true) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" {{ old('status', $job->status ?? true) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Active</span>
                </label>
            </div>
        </div>
    </div>

</div>