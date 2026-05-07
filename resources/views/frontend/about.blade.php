@extends('frontend.master')

@section('content')

<!-- ABOUT STORY -->
<section class="section about-premium">
  <div class="container">
    <div class="row g-4 align-items-center">

      <div class="col-lg-6">
        <div class="section-kicker mb-2">
          <span class="kicker-dot"></span>
          {{ $about->story_kicker }}
        </div>

        <h2 class="about-title fw-bold mb-3">
          {{ $about->story_title }}
          <span class="about-title-gradient">
            {{ $about->story_highlight }}
          </span>
        </h2>

        <p class="text-muted-2 about-lead mb-4">
          {{ $about->story_description }}
        </p>

        @if($storyFeatures->count())
          <div class="row g-3">
            @foreach($storyFeatures as $feature)
              <div class="col-md-6">
                <div class="about-feature hover-lift">
                  <div class="about-feature-icon">
                    <i class="{{ $feature->icon ?: 'bi bi-check-circle' }}"></i>
                  </div>

                  <div>
                    <div class="fw-semibold">
                      {{ $feature->title }}
                    </div>

                    <div class="small text-muted-2">
                      {{ $feature->description }}
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endif

        <div class="mt-4 d-flex flex-wrap gap-2">
          <a href="{{ url('/#services') }}" class="btn btn-hero-primary">
            <i class="bi bi-layers"></i> View Services
          </a>

          <a href="{{ url('/#jobs') }}" class="btn btn-hero-secondary">
            <i class="bi bi-search"></i> Browse Jobs
          </a>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="about-panel card-soft p-4 position-relative overflow-hidden">
          <div class="about-panel-glow"></div>

          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-semibold">
                {{ $about->panel_title }}
              </div>

              <div class="small text-muted-2">
                {{ $about->panel_subtitle }}
              </div>
            </div>

            @if($about->panel_badge)
              <span class="badge about-badge">
                {{ $about->panel_badge }}
              </span>
            @endif
          </div>

          <div class="row g-3 mt-3">
            <div class="col-12">
              <div class="about-card">
                <div class="about-card-head">
                  <i class="bi bi-bullseye"></i>
                  <span>{{ $about->mission_title }}</span>
                </div>

                <div class="small text-muted-2 mt-2">
                  {{ $about->mission_description }}
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="about-card">
                <div class="about-card-head">
                  <i class="bi bi-eye"></i>
                  <span>{{ $about->vision_title }}</span>
                </div>

                <div class="small text-muted-2 mt-2">
                  {{ $about->vision_description }}
                </div>
              </div>
            </div>

            @if($tags->count())
              <div class="col-12">
                <div class="about-tags">
                  @foreach($tags as $tag)
                    <span class="about-tag">
                      <i class="{{ $tag->icon ?: 'bi bi-check-circle' }}"></i>
                      {{ $tag->title }}
                    </span>
                  @endforeach
                </div>
              </div>
            @endif
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- VALUES -->
<section class="section services-premium">
  <div class="container">

    <div class="row align-items-end g-3 mb-4">
      <div class="col-lg-7">
        <div class="section-kicker mb-2">
          <span class="kicker-dot"></span>
          {{ $about->values_kicker }}
        </div>

        <h2 class="fw-bold mb-2">
          {{ $about->values_title }}
        </h2>

        <p class="text-muted-2 mb-0">
          {{ $about->values_description }}
        </p>
      </div>

      <div class="col-lg-5 text-lg-end">
        <a href="{{ url('/#contact') }}" class="btn btn-hero-primary">
          <i class="bi bi-chat-dots"></i> Discuss Requirement
        </a>
      </div>
    </div>

    @if($values->count())
      <div class="row g-4">
        @foreach($values as $value)
          <div class="col-md-6 col-lg-3">
            <div class="service-card h-100 hover-lift">
              <div class="service-card-top">
                <div class="service-icon">
                  <i class="{{ $value->icon ?: 'bi bi-check-circle' }}"></i>
                </div>

                @if($value->tag)
                  <span class="service-tag">
                    {{ $value->tag }}
                  </span>
                @endif
              </div>

              <h5 class="fw-semibold mb-2">
                {{ $value->title }}
              </h5>

              <p class="text-muted-2 mb-0">
                {{ $value->description }}
              </p>
            </div>
          </div>
        @endforeach
      </div>
    @endif

  </div>
</section>

<!-- HOW WE WORK -->
<section class="section industries-premium">
  <div class="container">

    <div class="row align-items-end g-3 mb-4">
      <div class="col-lg-7">
        <div class="section-kicker mb-2">
          <span class="kicker-dot"></span>
          {{ $about->process_kicker }}
        </div>

        <h2 class="fw-bold mb-2">
          {{ $about->process_title }}
        </h2>

        <p class="text-muted-2 mb-0">
          {{ $about->process_description }}
        </p>
      </div>
    </div>

    @if($processSteps->count())
      <div class="row g-3">
        @foreach($processSteps as $step)
          <div class="col-md-6 col-lg-3">
            <div class="industry-card hover-lift {{ $loop->last ? 'industry-card-special' : '' }}">
              <div class="industry-icon">
                <i class="{{ $step->icon ?: 'bi bi-check-circle' }}"></i>
              </div>

              <div class="industry-title">
                {{ $step->title }}
              </div>

              <div class="industry-sub">
                {{ $step->description }}
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif

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
            {{ $about->cta_title }}
          </div>

          <div class="trust-sub text-muted-2">
            {{ $about->cta_description }}
          </div>
        </div>

        <div class="col-lg-4 text-lg-end">
          @if($about->cta_button_1_text)
            <a href="{{ url($about->cta_button_1_link) }}" class="btn btn-hero-primary btn-lg">
              <i class="bi bi-send"></i>
              {{ $about->cta_button_1_text }}
            </a>
          @endif

          @if($about->cta_button_2_text)
            <a href="{{ url($about->cta_button_2_link) }}" class="btn btn-hero-secondary btn-lg ms-2">
              <i class="bi bi-search"></i>
              {{ $about->cta_button_2_text }}
            </a>
          @endif
        </div>

      </div>
    </div>
  </div>
</section>

@endsection