@extends('frontend.master')

@section('content')


<!-- HERO (Premium) -->
<header id="home" class="hero hero-premium">
  <div class="hero-bg-grid"></div>
  <div class="hero-orb hero-orb-1"></div>
  <div class="hero-orb hero-orb-2"></div>

  <div class="container position-relative">
    <div class="row align-items-center g-4">
      <!-- Left content -->
      <div class="col-lg-7">
        <div class="hero-badge mb-3">
          <i class="bi bi-shield-check"></i>
          Trusted Recruitment & Manpower Partner
          <span class="hero-badge-dot"></span>
        </div>

        <h1 class="hero-title fw-bold lh-1 mb-3">
          Premium Manpower & Recruitment
          <span class="hero-title-gradient">for Growing Businesses</span>
        </h1>

        <p class="hero-subtitle text-muted-2 mb-4">
          Hire skilled, semi-skilled, and unskilled workforce with speed, reliability, and strong coordination.
          Display jobs on your website and collect applications seamlessly.
        </p>

        <div class="d-flex flex-wrap gap-2">
          <a href="#jobs" class="btn btn-hero-primary btn-lg">
            <i class="bi bi-briefcase"></i>
            Explore Jobs
          </a>

          <a href="#services" class="btn btn-hero-secondary btn-lg">
            <i class="bi bi-layers"></i>
            Our Services
          </a>
        </div>

        <!-- Trust pills -->
        <div class="d-flex flex-wrap gap-2 mt-4">
          <span class="hero-pill"><i class="bi bi-patch-check"></i> Verified openings</span>
          <span class="hero-pill"><i class="bi bi-lightning-charge"></i> Fast turnaround</span>
          <span class="hero-pill"><i class="bi bi-building-check"></i> Industry expertise</span>
        </div>

        <!-- Mini stats row -->
        <div class="row g-3 mt-4">
          <div class="col-6 col-md-4">
            <div class="hero-mini-stat">
              <div class="hero-mini-value">500+</div>
              <div class="hero-mini-label">Candidates Placed</div>
            </div>
          </div>
          <div class="col-6 col-md-4">
            <div class="hero-mini-stat">
              <div class="hero-mini-value">100+</div>
              <div class="hero-mini-label">Client Companies</div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="hero-mini-stat">
              <div class="hero-mini-value">24–72 hrs</div>
              <div class="hero-mini-label">Shortlist Time</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right panel -->
      <div class="col-lg-5">
        <div class="hero-right">

          <!-- Visual panel -->
          <div class="hero-visual card-soft p-4 mb-3">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <div class="fw-semibold">Recruitment Snapshot</div>
                <div class="small text-muted-2">A premium overview panel (placeholder)</div>
              </div>
              <span class="badge hero-badge-live">Live</span>
            </div>

            <div class="row g-3 mt-2">
              <div class="col-6">
                <div class="hero-kpi">
                  <div class="hero-kpi-label">Open Roles</div>
                  <div class="hero-kpi-value">120+</div>
                </div>
              </div>
              <div class="col-6">
                <div class="hero-kpi">
                  <div class="hero-kpi-label">Industries</div>
                  <div class="hero-kpi-value">10+</div>
                </div>
              </div>
              <div class="col-12">
                <div class="hero-kpi hero-kpi-wide">
                  <div class="d-flex justify-content-between">
                    <span class="hero-kpi-label">Fulfillment readiness</span>
                    <span class="hero-kpi-label">85%</span>
                  </div>
                  <div class="progress mt-2" style="height:10px;">
                    <div class="progress-bar" role="progressbar" style="width:85%"></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Floating chips -->
            <div class="hero-float-chip hero-float-1">
              <i class="bi bi-check2-circle"></i> Verified
            </div>
            <div class="hero-float-chip hero-float-2">
              <i class="bi bi-truck"></i> Logistics
            </div>
          </div>

          <!-- Search Card -->
          <div class="hero-search card-soft p-4">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <div class="fw-semibold">Quick Job Search</div>
                <div class="small text-muted-2">Find openings by keyword & location</div>
              </div>
              <span class="badge text-bg-light border">Updated</span>
            </div>

            <form class="mt-3">
              <div class="mb-2">
                <label class="form-label small">Keyword</label>
                <div class="input-icon">
                  <i class="bi bi-search"></i>
                  <input class="form-control form-control-lg" placeholder="e.g., Driver, Helper, Accountant">
                </div>
              </div>

              <div class="mb-2">
                <label class="form-label small">Location</label>
                <div class="input-icon">
                  <i class="bi bi-geo-alt"></i>
                  <input class="form-control form-control-lg" placeholder="e.g., Noida, Delhi, Gurgaon">
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label small">Industry</label>
                <select class="form-select form-select-lg">
                  <option selected>Select industry</option>
                  <option>Manufacturing</option>
                  <option>Logistics & Warehouse</option>
                  <option>Security & Facility</option>
                  <option>Hospitality</option>
                  <option>Healthcare</option>
                </select>
              </div>

              <div class="d-grid">
                <button type="button" class="btn btn-hero-primary btn-lg">
                  <i class="bi bi-search"></i> Search Jobs
                </button>
              </div>

              <div class="text-center mt-3 small text-muted-2">
                Tip: You can also apply via <strong>Contact</strong> section below.
              </div>
            </form>
          </div>

        </div>
      </div>

    </div>
  </div>
</header>


<!-- TRUST STRIP (Premium) -->
<section class="trust-strip">
  <div class="container">
    <div class="trust-strip-inner">
      <div class="row align-items-center g-3">
        <!-- Left -->
        <div class="col-lg-4 text-center text-lg-start">
          <div class="trust-title">
            <span class="trust-icon">
              <i class="bi bi-stars"></i>
            </span>
            Trusted by teams across sectors
          </div>
          <div class="trust-sub text-muted-2 d-none d-md-block">
            Recruitment & manpower support across industries.
          </div>
        </div>

        <!-- Right: Chips -->
        <div class="col-lg-8">
          <div class="trust-chips justify-content-center justify-content-lg-end">
            <span class="trust-chip"><i class="bi bi-gear"></i> Manufacturing</span>
            <span class="trust-chip"><i class="bi bi-truck"></i> Logistics</span>
            <span class="trust-chip"><i class="bi bi-shield-check"></i> Security</span>
            <span class="trust-chip"><i class="bi bi-cup-hot"></i> Hospitality</span>
            <span class="trust-chip"><i class="bi bi-hospital"></i> Healthcare</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ABOUT (Premium) -->
<section id="about" class="section about-premium">
  <div class="container">
    <div class="row g-4 align-items-center">

      <!-- Left: Content -->
      <div class="col-lg-6">
        <div class="section-kicker mb-2">
          <span class="kicker-dot"></span>
          {{ $about->story_kicker }}
        </div>

        <h2 class="about-title fw-bold mb-3">
          {{ $about->story_title }}
          <span class="about-title-gradient">{{ $about->story_highlight }}</span>
        </h2>

        <p class="text-muted-2 about-lead mb-4">
          {{ $about->story_description }}
        </p>

        <!-- Feature cards -->
        <div class="row g-3">
          @foreach($aboutFeatures as $feature)
            <div class="col-md-6">
              <div class="about-feature hover-lift">
                <div class="about-feature-icon">
                  <i class="{{ $feature->icon ?: 'bi bi-check-circle' }}"></i>
                </div>
                <div>
                  <div class="fw-semibold">{{ $feature->title }}</div>
                  <div class="small text-muted-2">{{ $feature->description }}</div>
                </div>
              </div>
            </div>
          @endforeach
        </div>

       <!-- Timeline-style highlights -->
        <div class="about-highlights mt-4">
          <div class="about-high-item">
            <div class="about-high-dot"></div>
            <div>
              <div class="fw-semibold">Quality-first hiring</div>
              <div class="small text-muted-2">Right profiles that match skills and location.</div>
            </div>
          </div>
          <div class="about-high-item">
            <div class="about-high-dot"></div>
            <div>
              <div class="fw-semibold">Operational readiness</div>
              <div class="small text-muted-2">Bulk hiring support for warehouse/factory setups.</div>
            </div>
          </div>
          <div class="about-high-item">
            <div class="about-high-dot"></div>
            <div>
              <div class="fw-semibold">Long-term partnership</div>
              <div class="small text-muted-2">On-going manpower support and coordination.</div>
            </div>
          </div>
        </div>

        <div class="mt-4 d-flex flex-wrap gap-2">
          <a href="#services" class="btn btn-hero-primary">
            <i class="bi bi-arrow-right"></i> See Services
          </a>
          <a href="#contact" class="btn btn-hero-secondary">
            <i class="bi bi-chat-dots"></i> Talk to Us
          </a>
        </div>
      </div>

      <!-- Right: Premium Snapshot Panel -->
      <div class="col-lg-6">
        <div class="about-panel card-soft p-4 position-relative overflow-hidden">
          <div class="about-panel-glow"></div>

          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-semibold">{{ $about->panel_title }}</div>
              <div class="small text-muted-2">{{ $about->panel_subtitle }}</div>
            </div>

            @if($about->panel_badge)
              <span class="badge about-badge">{{ $about->panel_badge }}</span>
            @endif
          </div>

          <div class="row g-3 mt-3">
            <div class="col-6">
              <div class="about-metric">
                <div class="about-metric-value">{{ $about->hero_stat_1_value }}</div>
                <div class="about-metric-label">{{ $about->hero_stat_1_label }}</div>
              </div>
            </div>

            <div class="col-6">
              <div class="about-metric">
                <div class="about-metric-value">{{ $about->hero_stat_2_value }}</div>
                <div class="about-metric-label">{{ $about->hero_stat_2_label }}</div>
              </div>
            </div>

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

            <!-- Chips -->
            <div class="col-12">
              <div class="about-tags">
                <span class="about-tag"><i class="bi bi-patch-check"></i> Verified Profiles</span>
                <span class="about-tag"><i class="bi bi-clock-history"></i> Quick Turnaround</span>
                <span class="about-tag"><i class="bi bi-people"></i> Bulk Hiring</span>
                <span class="about-tag"><i class="bi bi-shield-check"></i> Reliable Support</span>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>


<!-- SERVICES (Premium) -->
<section id="services" class="section services-premium">
  <div class="container">
    <!-- Heading -->
    <div class="row align-items-end g-3 mb-4">
      <div class="col-lg-7">
        <div class="section-kicker mb-2">
          <span class="kicker-dot"></span>
          Services
        </div>
        <h2 class="fw-bold mb-2">Recruitment & Manpower Solutions</h2>
        <p class="text-muted-2 mb-0">
          Premium staffing services designed for speed, scale, and reliability.
        </p>
      </div>
      <div class="col-lg-5 text-lg-end">
        <a href="#contact" class="btn btn-hero-primary">
          <i class="bi bi-send"></i> Get a Quote
        </a>
        <a href="#jobs" class="btn btn-hero-secondary ms-2">
          <i class="bi bi-search"></i> Browse Jobs
        </a>
      </div>
    </div>

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


<!-- INDUSTRIES (Premium) -->
<section id="industries" class="section industries-premium">
  <div class="container">
    <div class="row align-items-end g-3 mb-4">
      <div class="col-lg-7">
        <div class="section-kicker mb-2">
          <span class="kicker-dot"></span>
          Industries
        </div>
        <h2 class="fw-bold mb-2">Industries We Serve</h2>
        <p class="text-muted-2 mb-0">
          We provide recruitment and manpower support across multiple sectors with role-specific shortlisting.
        </p>
      </div>

      <div class="col-lg-5 text-lg-end">
        <a class="btn btn-hero-primary" href="#contact">
          <i class="bi bi-send"></i> Share Requirement
        </a>
        <a class="btn btn-hero-secondary ms-2" href="#services">
          <i class="bi bi-layers"></i> Services
        </a>
      </div>
    </div>

    <div class="row g-4 align-items-stretch">
      <!-- Left grid -->
      <div class="col-lg-8">
        <div class="row g-3">
         @foreach($industries as $industry)
        <div class="col-6 col-md-4 col-lg-4">
          <a class="industry-link" href="/industries/#{{ $industry->slug }}">
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

          <!-- Optional: add one more card for “Other” -->
          <div class="col-12 col-md-4">
            <div class="industry-card hover-lift industry-card-special">
              <div class="industry-icon"><i class="bi bi-grid-1x2"></i></div>
              <div class="industry-title">Custom Roles</div>
              <div class="industry-sub">Tell us your requirement</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right CTA panel -->
      <div class="col-lg-4">
        <div class="industry-cta card-soft p-4 h-100 position-relative overflow-hidden">
          <div class="industry-cta-glow"></div>

          <span class="badge industry-cta-badge mb-3">
            <i class="bi bi-stars"></i> Premium Support
          </span>

          <h4 class="fw-bold mb-2">Need manpower urgently?</h4>
          <p class="text-muted-2 mb-3">
            Share role details, headcount, location, and joining timeline.
            We’ll coordinate shortlisting and interviews quickly.
          </p>

          <div class="industry-cta-points">
            <div class="industry-cta-point">
              <i class="bi bi-check2-circle"></i> Verified profiles
            </div>
            <div class="industry-cta-point">
              <i class="bi bi-check2-circle"></i> Fast shortlist
            </div>
            <div class="industry-cta-point">
              <i class="bi bi-check2-circle"></i> Dedicated coordination
            </div>
          </div>

          <div class="d-grid mt-4">
            <a href="#contact" class="btn btn-hero-primary btn-lg">
              <i class="bi bi-send"></i> Share Requirement
            </a>
          </div>

          <div class="text-center mt-3 small text-muted-2">
            Response within business hours.
          </div>
        </div>
      </div>
    </div>

  </div>
</section>



<!-- JOBS (Premium) -->
<section id="jobs" class="section jobs-premium">
  <div class="container">

    <div class="row align-items-end g-3 mb-4">
      <div class="col-lg-7">
        <div class="section-kicker mb-2">
          <span class="kicker-dot"></span>
          Jobs
        </div>
        <h2 class="fw-bold mb-2">Latest Job Openings</h2>
        <p class="text-muted-2 mb-0">
          Sample listings for UI. Later we’ll connect to real job data (admin posting / database).
        </p>
      </div>

      <div class="col-lg-5 text-lg-end">
        <a class="btn btn-hero-secondary" href="#contact">
          <i class="bi bi-send"></i> Apply via Contact
        </a>
        <a class="btn btn-hero-primary ms-2" href="{{ route('frontend.jobs') }}">
          <i class="bi bi-arrow-right"></i> View All Jobs
        </a>
      </div>
    </div>

    <!-- Filter bar (UI only) -->
    <div class="jobs-filter card-soft p-3 p-md-4 mb-4">
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

      <div class="d-flex flex-wrap gap-2 mt-3">
        <span class="jobs-chip"><i class="bi bi-lightning-charge"></i> Urgent Hiring</span>
        <span class="jobs-chip"><i class="bi bi-patch-check"></i> Verified Openings</span>
        <span class="jobs-chip"><i class="bi bi-building-check"></i> Multiple Industries</span>
      </div>
    </div>

    <div class="row g-4 align-items-stretch">
      <!-- Job cards -->
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
              <i class="bi bi-geo-alt"></i>
              {{ $job->location }}
            </span>
          </div>

          <div class="job-title">
            {{ $job->title }}
          </div>

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
            @if($job->salary)
              <span class="job-chip">
                <i class="bi bi-currency-rupee"></i>
                {{ $job->salary }}
              </span>
            @endif

            @if($job->posted_text)
              <span class="job-chip">
                <i class="bi bi-clock"></i>
                {{ $job->posted_text }}
              </span>
            @endif
          </div>

          <div class="job-actions mt-4">
            <button class="btn btn-sm btn-hero-secondary"
                          data-bs-toggle="modal"
                          data-bs-target="#jobModal{{ $job->id }}">
                    <i class="bi bi-eye"></i> Details
                  </button>

            <a class="btn btn-sm btn-hero-primary" href="{{ url($job->apply_link ?: '/contact') }}">
              <i class="bi bi-send"></i>
              {{ $job->apply_button_text ?: 'Apply' }}
            </a>
          </div>
        </div>
      </div>
    @empty
      <div class="col-12">
        <div class="card-soft p-4 text-center">
          <h5 class="fw-bold mb-2">No jobs available</h5>
          <p class="text-muted-2 mb-0">New openings will be updated soon.</p>
        </div>
      </div>
    @endforelse

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
              <i class="{{ $job->job_type_icon ?: 'bi bi-briefcase' }}"></i>
              {{ $job->job_type }}
            </span>

            <span class="job-chip">
              <i class="bi bi-geo-alt"></i> {{ $job->location }}
            </span>

            @if($job->salary)
              <span class="job-chip">
                <i class="bi bi-currency-rupee"></i> {{ $job->salary }}
              </span>
            @endif

            @if($job->posted_text)
              <span class="job-chip">
                <i class="bi bi-clock"></i> {{ $job->posted_text }}
              </span>
            @endif
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
          <a href="{{ url($job->apply_link ?: '/contact') }}" class="btn btn-hero-primary">
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

  </div>
</div>

      <!-- Right: CTA / Info panel -->
      <div class="col-lg-4">
        <div class="jobs-side card-soft p-4 h-100 position-relative overflow-hidden">
          <div class="jobs-side-glow"></div>

          <span class="badge jobs-side-badge mb-3">
            <i class="bi bi-building-check"></i> For Employers
          </span>

          <h4 class="fw-bold mb-2">Need staff for your company?</h4>
          <p class="text-muted-2 mb-3">
            Share your requirement and we’ll coordinate shortlisting and interviews quickly.
          </p>

          <div class="jobs-side-points">
            <div class="jobs-side-point"><i class="bi bi-check2-circle"></i> Bulk hiring support</div>
            <div class="jobs-side-point"><i class="bi bi-check2-circle"></i> Role-matched candidates</div>
            <div class="jobs-side-point"><i class="bi bi-check2-circle"></i> Fast coordination</div>
          </div>

          <div class="d-grid mt-4">
            <a href="#contact" class="btn btn-hero-primary btn-lg">
              <i class="bi bi-send"></i> Post Requirement
            </a>
          </div>

          <div class="text-center mt-3 small text-muted-2">
            We respond within business hours.
          </div>
        </div>
      </div>
    </div>

  </div>
</section>


<!-- CONTACT (Premium) -->
<section id="contact" class="section contact-premium">
  <div class="container">
    <div class="row g-4 align-items-start">

      <!-- LEFT: Contact info -->
      <div class="col-lg-5">
        <div class="section-kicker mb-2">
          <span class="kicker-dot"></span>
          Reach Us
        </div>

        <h2 class="fw-bold mb-2">We’re here to help</h2>

        <p class="text-muted-2 mb-4">
          For hiring: share role, headcount, location and joining timeline.
          For job apply: share your details and resume optional.
        </p>

        <div class="contact-cards d-grid gap-3">

          @if($websiteSetting->address)
            <div class="contact-info-card">
              <div class="contact-info-icon">
                <i class="bi bi-geo-alt"></i>
              </div>
              <div>
                <div class="fw-semibold">Office Address</div>
                <div class="small text-muted-2">{{ $websiteSetting->address }}</div>
              </div>
            </div>
          @endif

          @if($websiteSetting->phone)
            <div class="contact-info-card">
              <div class="contact-info-icon">
                <i class="bi bi-telephone"></i>
              </div>
              <div>
                <div class="fw-semibold">Phone</div>
                <div class="small text-muted-2">{{ $websiteSetting->phone }}</div>
              </div>
            </div>
          @endif

          @if($websiteSetting->email)
            <div class="contact-info-card">
              <div class="contact-info-icon">
                <i class="bi bi-envelope"></i>
              </div>
              <div>
                <div class="fw-semibold">Email</div>
                <div class="small text-muted-2">{{ $websiteSetting->email }}</div>
              </div>
            </div>
          @endif

        </div>

        <div class="contact-actions mt-4">
          @if($websiteSetting->phone)
            <a class="contact-action-btn" href="{{ $websiteSetting->phone_link }}">
              <i class="bi bi-telephone"></i> Call
            </a>
          @endif

          @if($websiteSetting->whatsapp_number && $websiteSetting->whatsapp_number !== '#')
            <a class="contact-action-btn" href="{{ $websiteSetting->whatsapp_number }}" target="_blank">
              <i class="bi bi-whatsapp"></i> WhatsApp
            </a>
          @endif

          @if($websiteSetting->email)
            <a class="contact-action-btn" href="{{ $websiteSetting->email_link }}">
              <i class="bi bi-envelope"></i> Email
            </a>
          @endif
        </div>

        <!-- Map -->
        @if($websiteSetting->google_map_embed)
          <div class="contact-map mt-4">
            {!! $websiteSetting->google_map_embed !!}
          </div>
        @else
          <div class="contact-map mt-4">
            <div class="contact-map-badge">
              <i class="bi bi-pin-map"></i> Map
            </div>
            <div class="contact-map-body">
              <div class="text-muted-2 small">
                Google Map not added yet.
              </div>
            </div>
          </div>
        @endif

       
      </div>

      <!-- RIGHT: Form -->
      <div class="col-lg-7">
        <div class="contact-form card-soft p-4 p-md-5 position-relative overflow-hidden">
          <div class="contact-form-glow"></div>

          <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
            <div>
              <div class="fw-bold fs-4 mb-1">Send Your Details</div>
              <div class="text-muted-2">Submit your requirement or job application</div>
            </div>

            <span class="badge contact-form-badge">
              <i class="bi bi-shield-check"></i> Secure
            </span>
          </div>

          <form method="POST"
                action="{{ route('frontend.contact.store') }}"
                enctype="multipart/form-data"
                class="row g-3 mt-3">
            @csrf

            @if(session('success'))
              <div class="col-12">
                <div class="alert alert-success rounded-4 mb-0">
                  {{ session('success') }}
                </div>
              </div>
            @endif

            @if($errors->any())
              <div class="col-12">
                <div class="alert alert-danger rounded-4 mb-0">
                  Please check required fields and try again.
                </div>
              </div>
            @endif

            <div class="col-md-6">
              <label class="form-label">Full Name <span class="text-danger">*</span></label>
              <div class="input-icon">
                <i class="bi bi-person"></i>
                <input name="full_name"
                       value="{{ old('full_name') }}"
                       class="form-control form-control-lg @error('full_name') is-invalid @enderror"
                       placeholder="Enter your name"
                       required>
              </div>
              @error('full_name')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
              <div class="input-icon">
                <i class="bi bi-telephone"></i>
                <input name="mobile_number"
                       value="{{ old('mobile_number') }}"
                       class="form-control form-control-lg @error('mobile_number') is-invalid @enderror"
                       placeholder="Enter mobile number"
                       required>
              </div>
              @error('mobile_number')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Email</label>
              <div class="input-icon">
                <i class="bi bi-envelope"></i>
                <input name="email"
                       value="{{ old('email') }}"
                       class="form-control form-control-lg @error('email') is-invalid @enderror"
                       type="email"
                       placeholder="Enter email">
              </div>
              @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">You are a <span class="text-danger">*</span></label>
              <select name="user_type"
                      class="form-select form-select-lg @error('user_type') is-invalid @enderror"
                      required>
                <option value="">Select</option>
                <option value="Candidate (Job Apply)" {{ old('user_type') == 'Candidate (Job Apply)' ? 'selected' : '' }}>
                  Candidate (Job Apply)
                </option>
                <option value="Company (Requirement)" {{ old('user_type') == 'Company (Requirement)' ? 'selected' : '' }}>
                  Company (Requirement)
                </option>
              </select>
              @error('user_type')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Preferred Location</label>
              <div class="input-icon">
                <i class="bi bi-geo-alt"></i>
                <input name="preferred_location"
                       value="{{ old('preferred_location') }}"
                       class="form-control form-control-lg"
                       placeholder="e.g., Patna / Noida / Delhi">
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Industry</label>
              <select name="industry" class="form-select form-select-lg">
                <option value="">Select industry</option>

                @isset($industries)
                  @foreach($industries as $industry)
                    <option value="{{ $industry->title }}" {{ old('industry') == $industry->title ? 'selected' : '' }}>
                      {{ $industry->title }}
                    </option>
                  @endforeach
                @endisset
              </select>
            </div>

            <div class="col-12">
              <label class="form-label">Message / Requirement <span class="text-danger">*</span></label>
              <textarea name="message"
                        class="form-control form-control-lg @error('message') is-invalid @enderror"
                        rows="5"
                        placeholder="Write your message"
                        required>{{ old('message') }}</textarea>

              <div class="form-text">
                Employers: role + headcount + location + joining timeline.
                Candidates: role interested + experience + location.
              </div>

              @error('message')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-12">
              <label class="form-label">Upload Resume</label>
              <input name="resume"
                     class="form-control form-control-lg @error('resume') is-invalid @enderror"
                     type="file"
                     accept=".pdf,.doc,.docx">

              <div class="form-text">PDF/DOC/DOCX only. Max size 4MB.</div>

              @error('resume')
                <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-12 d-grid mt-2">
              <button type="submit" class="btn btn-hero-primary btn-lg">
                <i class="bi bi-send"></i> Submit
              </button>
            </div>

            <div class="col-12">
              <div class="contact-privacy">
                <i class="bi bi-lock"></i>
                We never share your details with third parties without your permission.
              </div>
            </div>
          </form>

        </div>

       
      </div>

    </div>
  </div>
</section>


@endsection