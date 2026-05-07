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
          <i class="{{ $servicePage->hero_badge_icon ?: 'bi bi-layers' }}"></i>
          {{ $servicePage->hero_badge_text }}
          <span class="hero-badge-dot"></span>
        </div>

        <h1 class="hero-title fw-bold lh-1 mb-3">
          {{ $servicePage->hero_title }}
          <span class="hero-title-gradient">{{ $servicePage->hero_highlight }}</span>
        </h1>

        <p class="hero-subtitle text-muted-2 mb-0">
          {{ $servicePage->hero_description }}
        </p>

        <nav aria-label="breadcrumb" class="mt-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ url('/#home') }}" class="text-decoration-none">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              {{ $servicePage->hero_breadcrumb_title ?: 'Services' }}
            </li>
          </ol>
        </nav>
      </div>

      <div class="col-lg-4">
        <div class="card card-soft p-4">
          <div class="fw-semibold mb-1">{{ $servicePage->hero_card_title }}</div>
          <div class="small text-muted-2">{{ $servicePage->hero_card_subtitle }}</div>

          <div class="row g-3 mt-2">
            <div class="col-6">
              <div class="metric">
                <div class="fw-bold fs-4">{{ $servicePage->hero_stat_1_value }}</div>
                <div class="small text-muted-2">{{ $servicePage->hero_stat_1_label }}</div>
              </div>
            </div>

            <div class="col-6">
              <div class="metric">
                <div class="fw-bold fs-4">{{ $servicePage->hero_stat_2_value }}</div>
                <div class="small text-muted-2">{{ $servicePage->hero_stat_2_label }}</div>
              </div>
            </div>

            <div class="col-12">
              <div class="p-3 bg-soft rounded-4">
                <div class="fw-semibold">{{ $servicePage->hero_support_title }}</div>
                <div class="small text-muted-2">{{ $servicePage->hero_support_text }}</div>
              </div>
            </div>
          </div>

          @if($servicePage->hero_button_text)
            <div class="d-grid mt-3">
              <a href="{{ url($servicePage->hero_button_link) }}" class="btn btn-hero-primary btn-lg">
                <i class="bi bi-send"></i> {{ $servicePage->hero_button_text }}
              </a>
            </div>
          @endif
        </div>
      </div>

    </div>
  </div>
</header>

<!-- SERVICES CONTENT -->
<section class="section services-premium">
  <div class="container">

    <div class="row g-4 align-items-stretch">
      <div class="col-lg-4">
        <div class="service-feature card-soft p-4 h-100 position-relative overflow-hidden">
          <div class="service-feature-glow"></div>

          <span class="badge service-badge mb-3">
            <i class="{{ $servicePage->featured_badge_icon ?: 'bi bi-stars' }}"></i>
            {{ $servicePage->featured_badge_text }}
          </span>

          <h3 class="fw-bold mb-2">{{ $servicePage->featured_title }}</h3>

          <p class="text-muted-2 mb-3">
            {{ $servicePage->featured_description }}
          </p>

          @if($featurePoints->count())
            <div class="service-points">
              @foreach($featurePoints as $point)
                <div class="service-point">
                  <i class="{{ $point->icon ?: 'bi bi-check2-circle' }}"></i>
                  <span>{{ $point->title }}</span>
                </div>
              @endforeach
            </div>
          @endif

          <div class="d-flex flex-wrap gap-2 mt-4">
            @if($servicePage->featured_button_1_text)
              <a href="{{ url($servicePage->featured_button_1_link) }}" class="btn btn-hero-primary">
                <i class="bi bi-chat-dots"></i> {{ $servicePage->featured_button_1_text }}
              </a>
            @endif

            @if($servicePage->featured_button_2_text)
              <a href="{{ url($servicePage->featured_button_2_link) }}" class="btn btn-hero-secondary">
                <i class="bi bi-buildings"></i> {{ $servicePage->featured_button_2_text }}
              </a>
            @endif
          </div>

          <div class="service-mini mt-4">
            <div class="service-mini-box">
              <div class="service-mini-value">{{ $servicePage->featured_stat_1_value }}</div>
              <div class="service-mini-label">{{ $servicePage->featured_stat_1_label }}</div>
            </div>

            <div class="service-mini-box">
              <div class="service-mini-value">{{ $servicePage->featured_stat_2_value }}</div>
              <div class="service-mini-label">{{ $servicePage->featured_stat_2_label }}</div>
            </div>

            <div class="service-mini-box">
              <div class="service-mini-value">{{ $servicePage->featured_stat_3_value }}</div>
              <div class="service-mini-label">{{ $servicePage->featured_stat_3_label }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="row g-4">
          @foreach($services as $service)
            <div class="col-md-6">
              <div class="service-card h-100 hover-lift">
                <div class="service-card-top">
                  <div class="service-icon">
                    <i class="{{ $service->icon ?: 'bi bi-check-circle' }}"></i>
                  </div>

                  @if($service->tag)
                    <span class="service-tag">{{ $service->tag }}</span>
                  @endif
                </div>

                <h5 class="fw-semibold mb-2">{{ $service->title }}</h5>

                <p class="text-muted-2 mb-3">
                  {{ $service->description }}
                </p>

                @if($service->button_text)
                  <a href="{{ url($service->button_link) }}" class="service-link">
                    {{ $service->button_text }} <i class="bi bi-arrow-right"></i>
                  </a>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

  </div>
</section>

<!-- PROCESS -->
<section class="section industries-premium">
  <div class="container">
    <div class="row align-items-end g-3 mb-4">
      <div class="col-lg-7">
        <div class="section-kicker mb-2">
          <span class="kicker-dot"></span>
          {{ $servicePage->process_eyebrow }}
        </div>

        <h2 class="fw-bold mb-2">
          {{ $servicePage->process_title }}
        </h2>

        <p class="text-muted-2 mb-0">
          {{ $servicePage->process_description }}
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
            {{ $servicePage->cta_title }}
          </div>

          <div class="trust-sub text-muted-2">
            {{ $servicePage->cta_description }}
          </div>
        </div>

        <div class="col-lg-4 text-lg-end">
          @if($servicePage->cta_button_1_text)
            <a href="{{ url($servicePage->cta_button_1_link) }}" class="btn btn-hero-primary btn-lg">
              <i class="bi bi-send"></i> {{ $servicePage->cta_button_1_text }}
            </a>
          @endif

          @if($servicePage->cta_button_2_text)
            <a href="{{ url($servicePage->cta_button_2_link) }}" class="btn btn-hero-secondary btn-lg ms-2">
              <i class="bi bi-search"></i> {{ $servicePage->cta_button_2_text }}
            </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

@endsection