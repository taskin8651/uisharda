@extends('frontend.master')

@section('content')

<!-- PAGE HERO -->
<header class="hero hero-premium" style="padding: 90px 0 55px;">
  <div class="hero-bg-grid"></div>
  <div class="hero-orb hero-orb-1"></div>
  <div class="hero-orb hero-orb-2"></div>

  <div class="container position-relative">
    <div class="row g-4 align-items-center">
      <div class="col-lg-8">
        <div class="hero-badge mb-3">
          <i class="{{ $jobPage->hero_badge_icon ?: 'bi bi-briefcase' }}"></i>
          {{ $jobPage->hero_badge_text }}
          <span class="hero-badge-dot"></span>
        </div>

        <h1 class="hero-title fw-bold lh-1 mb-3">
          {{ $jobPage->hero_title }}
          <span class="hero-title-gradient">{{ $jobPage->hero_highlight }}</span>
        </h1>

        <p class="hero-subtitle text-muted-2 mb-0">
          {{ $jobPage->hero_description }}
        </p>

        <nav aria-label="breadcrumb" class="mt-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ url('/#home') }}" class="text-decoration-none">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              {{ $jobPage->hero_breadcrumb_title ?: 'Jobs' }}
            </li>
          </ol>
        </nav>
      </div>

      <div class="col-lg-4">
        <div class="card card-soft p-4">
          <div class="fw-semibold mb-1">{{ $jobPage->hero_card_title }}</div>
          <div class="small text-muted-2">{{ $jobPage->hero_card_subtitle }}</div>

          <div class="row g-3 mt-2">
            <div class="col-6">
              <div class="metric">
                <div class="fw-bold fs-4">{{ $jobPage->hero_stat_1_value }}</div>
                <div class="small text-muted-2">{{ $jobPage->hero_stat_1_label }}</div>
              </div>
            </div>

            <div class="col-6">
              <div class="metric">
                <div class="fw-bold fs-4">{{ $jobPage->hero_stat_2_value }}</div>
                <div class="small text-muted-2">{{ $jobPage->hero_stat_2_label }}</div>
              </div>
            </div>

            <div class="col-12">
              <div class="p-3 bg-soft rounded-4">
                <div class="fw-semibold">{{ $jobPage->hero_tip_title }}</div>
                <div class="small text-muted-2">{{ $jobPage->hero_tip_text }}</div>
              </div>
            </div>
          </div>

          @if($jobPage->hero_button_text)
            <div class="d-grid mt-3">
              <a href="{{ url($jobPage->hero_button_link) }}" class="btn btn-hero-primary btn-lg">
                <i class="bi bi-send"></i> {{ $jobPage->hero_button_text }}
              </a>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</header>

<!-- FILTER BAR -->
<section class="section jobs-premium" style="padding-top: 40px;">
  <div class="container">

    <form method="GET" action="{{ route('frontend.jobs') }}" class="jobs-filter card-soft p-3 p-md-4 mb-4">
      <div class="row g-2 align-items-center">
        <div class="col-md-4">
          <div class="input-icon">
            <i class="bi bi-search"></i>
            <input name="title"
                   value="{{ request('title') }}"
                   class="form-control form-control-lg"
                   placeholder="{{ $jobPage->filter_title_placeholder }}">
          </div>
        </div>

        <div class="col-md-3">
          <div class="input-icon">
            <i class="bi bi-geo-alt"></i>
            <input name="location"
                   value="{{ request('location') }}"
                   class="form-control form-control-lg"
                   placeholder="{{ $jobPage->filter_location_placeholder }}">
          </div>
        </div>

        <div class="col-md-3">
          <select name="industry" class="form-select form-select-lg">
            <option value="">Industry</option>
            @foreach($industries as $industry)
              <option value="{{ $industry }}" {{ request('industry') == $industry ? 'selected' : '' }}>
                {{ $industry }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="col-md-2 d-grid">
          <button class="btn btn-hero-primary btn-lg" type="submit">
            <i class="bi bi-funnel"></i> {{ $jobPage->filter_button_text ?: 'Filter' }}
          </button>
        </div>
      </div>

      @if(count($jobPage->filter_chips_array))
        <div class="d-flex flex-wrap gap-2 mt-3">
          @foreach($jobPage->filter_chips_array as $chip)
            <span class="jobs-chip">
              <i class="bi bi-check2-circle"></i> {{ $chip }}
            </span>
          @endforeach
        </div>
      @endif
    </form>

    <div class="row g-4 align-items-start">
      <div class="col-lg-8">
        <div class="row g-4">

          @forelse($jobs as $job)
            <div class="col-md-6">
              <div class="job-premium-card hover-lift h-100">
                <div class="job-top">
                  <span class="job-tag">
                    <i class="{{ $job->job_type_icon ?: 'bi bi-briefcase' }}"></i>
                    {{ $job->job_type }}
                  </span>

                  <span class="job-meta">
                    <i class="bi bi-geo-alt"></i> {{ $job->location }}
                  </span>
                </div>

                <div class="job-title">{{ $job->title }}</div>

                <div class="job-sub text-muted-2">
                  Industry: {{ $job->industry }}
                  @if($job->experience)
                    • Experience: {{ $job->experience }}
                  @endif
                  @if($job->skills)
                    • Skills: {{ $job->skills }}
                  @endif
                </div>

                <div class="job-chips mt-3">
                  <span class="job-chip">
                    <i class="bi bi-currency-rupee"></i>
                    {{ $job->salary }}
                  </span>

                  <span class="job-chip">
                    <i class="bi bi-clock"></i>
                    {{ $job->posted_text }}
                  </span>
                </div>

                <div class="job-actions mt-4">
                  <button class="btn btn-sm btn-hero-secondary"
                          data-bs-toggle="modal"
                          data-bs-target="#jobModal{{ $job->id }}">
                    <i class="bi bi-eye"></i> Details
                  </button>

                  <a class="btn btn-sm btn-hero-primary" href="{{ url($job->apply_link) }}">
                    <i class="bi bi-send"></i> {{ $job->apply_button_text ?: 'Apply' }}
                  </a>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12">
              <div class="card-soft p-4 text-center">
                <h5 class="fw-bold mb-2">No jobs found</h5>
                <p class="text-muted-2 mb-0">Try different title, location or industry.</p>
              </div>
            </div>
          @endforelse

        </div>
        <style>
            
        </style>

        <div class="mt-5 d-flex justify-content-center custom-pagination">
    {{ $jobs->onEachSide(1)->links('pagination::bootstrap-5') }}
</div>
      </div>

      <div class="col-lg-4">
        <div class="position-sticky" style="top: 110px;">
          <div class="jobs-side card-soft p-4 mb-4 position-relative overflow-hidden">
            <div class="jobs-side-glow"></div>

            <span class="badge jobs-side-badge mb-3">
              <i class="{{ $jobPage->sidebar_badge_icon ?: 'bi bi-send' }}"></i>
              {{ $jobPage->sidebar_badge_text }}
            </span>

            <h4 class="fw-bold mb-2">{{ $jobPage->sidebar_title }}</h4>

            <p class="text-muted-2 mb-3">
              {{ $jobPage->sidebar_description }}
            </p>

            @if(count($jobPage->sidebar_points_array))
              <div class="jobs-side-points">
                @foreach($jobPage->sidebar_points_array as $point)
                  <div class="jobs-side-point">
                    <i class="bi bi-check2-circle"></i> {{ $point }}
                  </div>
                @endforeach
              </div>
            @endif

            @if($jobPage->sidebar_button_text)
              <div class="d-grid mt-4">
                <a href="{{ url($jobPage->sidebar_button_link) }}" class="btn btn-hero-primary btn-lg">
                  <i class="bi bi-send"></i> {{ $jobPage->sidebar_button_text }}
                </a>
              </div>
            @endif

            <div class="text-center mt-3 small text-muted-2">
              {{ $jobPage->sidebar_footer_text }}
            </div>
          </div>

          <div class="card card-soft p-4">
            <div class="fw-semibold mb-2">
              <i class="bi bi-info-circle"></i> {{ $jobPage->tips_title }}
            </div>

            @if(count($jobPage->candidate_tips_array))
              <ul class="mb-0 text-muted-2 small ps-3">
                @foreach($jobPage->candidate_tips_array as $tip)
                  <li>{{ $tip }}</li>
                @endforeach
              </ul>
            @endif
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- CTA STRIP -->
<section class="trust-strip">
  <div class="container">
    <div class="trust-strip-inner">
      <div class="row align-items-center g-3">
        <div class="col-lg-8">
          <div class="trust-title">
            <span class="trust-icon">
              <i class="bi bi-stars"></i>
            </span>
            {{ $jobPage->cta_title }}
          </div>

          <div class="trust-sub text-muted-2">
            {{ $jobPage->cta_description }}
          </div>
        </div>

        <div class="col-lg-4 text-lg-end">
          @if($jobPage->cta_button_1_text)
            <a href="{{ url($jobPage->cta_button_1_link) }}" class="btn btn-hero-primary btn-lg">
              <i class="bi bi-send"></i> {{ $jobPage->cta_button_1_text }}
            </a>
          @endif

          @if($jobPage->cta_button_2_text)
            <a href="{{ url($jobPage->cta_button_2_link) }}" class="btn btn-hero-secondary btn-lg ms-2">
              <i class="bi bi-layers"></i> {{ $jobPage->cta_button_2_text }}
            </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

@foreach($jobs as $job)
  <div class="modal fade" id="jobModal{{ $job->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content card-soft" style="border: 0;">
        <div class="modal-header border-0">
          <div>
            <h5 class="modal-title fw-bold">{{ $job->title }}</h5>
            <div class="small text-muted-2">
              {{ $job->industry }} • {{ $job->location }}
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body pt-0">
          <div class="d-flex flex-wrap gap-2 mb-3">
            <span class="job-tag">
              <i class="{{ $job->job_type_icon ?: 'bi bi-briefcase' }}"></i> {{ $job->job_type }}
            </span>
            <span class="job-chip"><i class="bi bi-geo-alt"></i> {{ $job->location }}</span>
            <span class="job-chip"><i class="bi bi-currency-rupee"></i> {{ $job->salary }}</span>
            <span class="job-chip"><i class="bi bi-clock"></i> {{ $job->posted_text }}</span>
          </div>

          @if(count($job->responsibilities_array))
            <div class="fw-semibold mb-2">Responsibilities</div>
            <ul class="text-muted-2 small ps-3">
              @foreach($job->responsibilities_array as $item)
                <li>{{ $item }}</li>
              @endforeach
            </ul>
          @endif

          @if(count($job->requirements_array))
            <div class="fw-semibold mb-2 mt-3">Requirements</div>
            <ul class="text-muted-2 small ps-3">
              @foreach($job->requirements_array as $item)
                <li>{{ $item }}</li>
              @endforeach
            </ul>
          @endif

          @if($job->how_to_apply_text)
            <div class="p-3 bg-soft rounded-4 mt-3">
              <div class="fw-semibold">
                {{ $job->how_to_apply_title ?: 'How to apply' }}
              </div>
              <div class="small text-muted-2">
                {{ $job->how_to_apply_text }}
              </div>
            </div>
          @endif
        </div>

        <div class="modal-footer border-0">
          <a href="{{ url($job->apply_link) }}" class="btn btn-hero-primary">
            <i class="bi bi-send"></i> {{ $job->apply_button_text ?: 'Apply' }}
          </a>

          <button type="button" class="btn btn-hero-secondary" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
@endforeach

@endsection