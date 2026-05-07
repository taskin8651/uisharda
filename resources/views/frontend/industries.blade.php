@extends('frontend.master')

@section('content')
<!-- INDUSTRIES PAGE HERO -->
<header class="hero hero-premium" style="padding: 90px 0 55px;">
  <div class="hero-bg-grid"></div>
  <div class="hero-orb hero-orb-1"></div>
  <div class="hero-orb hero-orb-2"></div>

  <div class="container position-relative">
    <div class="row g-4 align-items-center">
      <div class="col-lg-8">
        <div class="hero-badge mb-3">
          <i class="{{ $industryPage->hero_badge_icon ?: 'bi bi-buildings' }}"></i>
          {{ $industryPage->hero_badge_text }}
          <span class="hero-badge-dot"></span>
        </div>

        <h1 class="hero-title fw-bold lh-1 mb-3">
          {{ $industryPage->hero_title }}
          <span class="hero-title-gradient">
            {{ $industryPage->hero_highlight }}
          </span>
        </h1>

        <p class="hero-subtitle text-muted-2 mb-0">
          {{ $industryPage->hero_description }}
        </p>

        <nav aria-label="breadcrumb" class="mt-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ url('/#home') }}" class="text-decoration-none">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              {{ $industryPage->hero_breadcrumb_title ?: 'Industries' }}
            </li>
          </ol>
        </nav>
      </div>

      <div class="col-lg-4">
        <div class="card card-soft p-4">
          <div class="fw-semibold mb-1">
            {{ $industryPage->hero_card_title }}
          </div>

          <div class="small text-muted-2">
            {{ $industryPage->hero_card_subtitle }}
          </div>

          <div class="row g-3 mt-2">
            <div class="col-6">
              <div class="metric">
                <div class="fw-bold fs-4">
                  {{ $industryPage->hero_stat_1_value }}
                </div>

                <div class="small text-muted-2">
                  {{ $industryPage->hero_stat_1_label }}
                </div>
              </div>
            </div>

            <div class="col-6">
              <div class="metric">
                <div class="fw-bold fs-4">
                  {{ $industryPage->hero_stat_2_value }}
                </div>

                <div class="small text-muted-2">
                  {{ $industryPage->hero_stat_2_label }}
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="p-3 bg-soft rounded-4">
                <div class="fw-semibold">
                  {{ $industryPage->hero_support_title }}
                </div>

                <div class="small text-muted-2">
                  {{ $industryPage->hero_support_text }}
                </div>
              </div>
            </div>
          </div>

          @if($industryPage->hero_button_text)
            <div class="d-grid mt-3">
              <a href="{{ url($industryPage->hero_button_link) }}" class="btn btn-hero-primary btn-lg">
                <i class="bi bi-send"></i>
                {{ $industryPage->hero_button_text }}
              </a>
            </div>
          @endif
        </div>
      </div>

    </div>
  </div>
</header>

<!-- INDUSTRY GRID -->
<section class="section industries-premium">
  <div class="container">
    <div class="row align-items-end g-3 mb-4">
      <div class="col-lg-7">
        <div class="section-kicker mb-2">
          <span class="kicker-dot"></span>
          {{ $industryPage->grid_eyebrow }}
        </div>

        <h2 class="fw-bold mb-2">
          {{ $industryPage->grid_title }}
        </h2>

        <p class="text-muted-2 mb-0">
          {{ $industryPage->grid_description }}
        </p>
      </div>

      <div class="col-lg-5 text-lg-end">
        @if($industryPage->grid_button_1_text)
          <a class="btn btn-hero-secondary" href="{{ url($industryPage->grid_button_1_link) }}">
            <i class="bi bi-layers"></i> {{ $industryPage->grid_button_1_text }}
          </a>
        @endif

        @if($industryPage->grid_button_2_text)
          <a class="btn btn-hero-primary ms-2" href="{{ url($industryPage->grid_button_2_link) }}">
            <i class="bi bi-send"></i> {{ $industryPage->grid_button_2_text }}
          </a>
        @endif
      </div>
    </div>

    <div class="row g-3">
      @foreach($industries as $industry)
        <div class="col-6 col-md-4 col-lg-3">
          <a class="industry-link" href="#{{ $industry->slug }}">
            <div class="industry-card hover-lift {{ $industry->is_special ? 'industry-card-special' : '' }}">
              <div class="industry-icon">
                <i class="{{ $industry->icon ?: 'bi bi-building' }}"></i>
              </div>

              <div class="industry-title">
                {{ $industry->title }}
              </div>

              <div class="industry-sub">
                {{ $industry->subtitle }}
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- INDUSTRY DETAIL BLOCKS -->
<section class="section jobs-premium">
  <div class="container">
    <div class="row align-items-end g-3 mb-4">
      <div class="col-lg-7">
        <div class="section-kicker mb-2">
          <span class="kicker-dot"></span>
          {{ $industryPage->detail_eyebrow }}
        </div>

        <h2 class="fw-bold mb-2">
          {{ $industryPage->detail_title }}
        </h2>

        <p class="text-muted-2 mb-0">
          {{ $industryPage->detail_description }}
        </p>
      </div>
    </div>

    @foreach($industries as $industry)
      <div id="{{ $industry->slug }}" class="industry-detail card-soft p-4 p-md-5 mb-4 position-relative overflow-hidden">
        @if($loop->first)
          <div class="jobs-side-glow"></div>
        @endif

        <div class="row g-4 align-items-center">
          <div class="col-lg-8">
            <div class="d-flex align-items-center gap-2 mb-2">
              <span class="job-tag">
                <i class="{{ $industry->detail_badge_icon ?: $industry->icon }}"></i>
                {{ $industry->detail_badge_text ?: $industry->title }}
              </span>

              @if($industry->detail_chip_text)
                <span class="job-chip">
                  <i class="{{ $industry->detail_chip_icon ?: 'bi bi-check-circle' }}"></i>
                  {{ $industry->detail_chip_text }}
                </span>
              @endif
            </div>

            <h3 class="fw-bold mb-2">
              {{ $industry->detail_title }}
            </h3>

            <p class="text-muted-2 mb-3">
              {{ $industry->detail_description }}
            </p>

            @if($industry->activeRoles->count())
              <div class="d-flex flex-wrap gap-2">
                @foreach($industry->activeRoles as $role)
                  <span class="jobs-chip">
                    <i class="{{ $role->icon ?: 'bi bi-check-circle' }}"></i>
                    {{ $role->title }}
                  </span>
                @endforeach
              </div>
            @endif
          </div>

          <div class="col-lg-4">
            <div class="d-grid gap-2">
              @if($industry->button_text)
                <a href="{{ url($industry->button_link) }}" class="btn btn-hero-primary btn-lg">
                  <i class="bi bi-send"></i> {{ $industry->button_text }}
                </a>
              @endif

              @if($industry->job_button_text)
                <a href="{{ url($industry->job_button_link) }}" class="btn btn-hero-secondary btn-lg">
                  <i class="bi bi-search"></i> {{ $industry->job_button_text }}
                </a>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endforeach

  </div>
</section>

<!-- PROCESS STRIP -->
<section class="section industries-premium">
  <div class="container">
    <div class="row align-items-end g-3 mb-4">
      <div class="col-lg-7">
        <div class="section-kicker mb-2">
          <span class="kicker-dot"></span>
          {{ $industryPage->process_eyebrow }}
        </div>

        <h2 class="fw-bold mb-2">
          {{ $industryPage->process_title }}
        </h2>

        <p class="text-muted-2 mb-0">
          {{ $industryPage->process_description }}
        </p>
      </div>
    </div>

    <div class="row g-3">
      @foreach($processes as $process)
        <div class="col-md-6 col-lg-3">
          <div class="industry-card hover-lift {{ $process->is_special ? 'industry-card-special' : '' }}">
            <div class="industry-icon">
              <i class="{{ $process->icon ?: 'bi bi-check-circle' }}"></i>
            </div>

            <div class="industry-title">
              {{ $process->title }}
            </div>

            <div class="industry-sub">
              {{ $process->description }}
            </div>
          </div>
        </div>
      @endforeach
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
            {{ $industryPage->cta_title }}
          </div>

          <div class="trust-sub text-muted-2">
            {{ $industryPage->cta_description }}
          </div>
        </div>

        <div class="col-lg-4 text-lg-end">
          @if($industryPage->cta_button_1_text)
            <a href="{{ url($industryPage->cta_button_1_link) }}" class="btn btn-hero-primary btn-lg">
              <i class="bi bi-send"></i> {{ $industryPage->cta_button_1_text }}
            </a>
          @endif

          @if($industryPage->cta_button_2_text)
            <a href="{{ url($industryPage->cta_button_2_link) }}" class="btn btn-hero-secondary btn-lg ms-2">
              <i class="bi bi-search"></i> {{ $industryPage->cta_button_2_text }}
            </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

@endsection