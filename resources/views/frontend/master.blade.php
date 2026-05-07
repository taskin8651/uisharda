@php 

$websiteSetting = \App\Models\WebsiteSetting::first();
@endphp

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>{{ $websiteSetting->default_meta_title ?? 'Sharda Placement' }}</title>

  @if(!empty($websiteSetting->default_meta_description))
    <meta name="description" content="{{ $websiteSetting->default_meta_description }}">
  @endif

  @if(!empty($websiteSetting->default_meta_keywords))
    <meta name="keywords" content="{{ $websiteSetting->default_meta_keywords }}">
  @endif

  <link rel="icon" href="{{ $websiteSetting->favicon_url ?? asset('assets/img/logo.png') }}">

  <!-- Bootstrap 5.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

<!-- Preloader -->
<div id="preloader" class="preloader" aria-hidden="true">
  <div class="preloader-bg">
    <span class="preloader-orb orb-1"></span>
    <span class="preloader-orb orb-2"></span>
    <span class="preloader-orb orb-3"></span>
  </div>

  <div class="preloader-card" role="status" aria-label="Loading">
    <div class="preloader-brand">
      <img src="{{ $websiteSetting->logo_url ?? asset('assets/img/logo.png') }}"
           alt="{{ $websiteSetting->site_name ?? 'Sharda Placement' }}"
           class="preloader-logo">
    </div>

    <div class="preloader-ring">
      <span></span><span></span><span></span>
    </div>

    <div class="preloader-text">
      <div class="preloader-title">
        {{ $websiteSetting->site_name ?? 'Sharda Placement' }}
      </div>

      <div class="preloader-sub">
        {{ $websiteSetting->site_tagline ?? 'Preparing your experience…' }}
      </div>
    </div>

    <div class="preloader-dots" aria-hidden="true">
      <span></span><span></span><span></span>
    </div>
  </div>
</div>

<!-- Topbar (Premium) -->
<div class="topbar">
  <div class="container">
    <div class="topbar-inner d-flex flex-wrap align-items-center justify-content-between gap-2">

      <!-- Left: Contact chips -->
      <div class="d-flex flex-wrap align-items-center gap-2">

        @if(!empty($websiteSetting->phone))
          <a class="topbar-chip" href="{{ $websiteSetting->phone_link }}">
            <i class="bi bi-telephone"></i>
            <span>{{ $websiteSetting->phone }}</span>
          </a>
        @endif

        @if(!empty($websiteSetting->email))
          <a class="topbar-chip d-none d-md-inline-flex" href="{{ $websiteSetting->email_link }}">
            <i class="bi bi-envelope"></i>
            <span>{{ $websiteSetting->email }}</span>
          </a>
        @endif

        @if(!empty($websiteSetting->location_short))
          <div class="topbar-chip d-none d-lg-inline-flex" role="text">
            <i class="bi bi-geo-alt"></i>
            <span>{{ $websiteSetting->location_short }}</span>
          </div>
        @endif

      </div>

      <!-- Right: Hours + Social + CTA -->
      <div class="d-flex flex-wrap align-items-center gap-2">

        @if(!empty($websiteSetting->office_hours))
          <div class="topbar-meta d-none d-md-flex align-items-center gap-2">
            <i class="bi bi-clock"></i>
            <span>{{ $websiteSetting->office_hours }}</span>
          </div>
        @endif

        <div class="topbar-divider d-none d-md-block"></div>

        <div class="d-flex align-items-center gap-2">

          @if(!empty($websiteSetting->whatsapp_link) && $websiteSetting->whatsapp_link !== '#')
            <a class="topbar-icon"
               href="{{ $websiteSetting->whatsapp_link }}"
               target="_blank"
               aria-label="WhatsApp">
              <i class="bi bi-whatsapp"></i>
            </a>
          @endif

          @if(!empty($websiteSetting->facebook_url))
            <a class="topbar-icon"
               href="{{ $websiteSetting->facebook_url }}"
               target="_blank"
               aria-label="Facebook">
              <i class="bi bi-facebook"></i>
            </a>
          @endif

          @if(!empty($websiteSetting->instagram_url))
            <a class="topbar-icon"
               href="{{ $websiteSetting->instagram_url }}"
               target="_blank"
               aria-label="Instagram">
              <i class="bi bi-instagram"></i>
            </a>
          @endif

        </div>

        @if(!empty($websiteSetting->topbar_button_text))
          <a class="topbar-cta ms-md-1"
             href="{{ url($websiteSetting->topbar_button_link ?? '/contact') }}">
            <i class="bi bi-send"></i>
            <span>{{ $websiteSetting->topbar_button_text }}</span>
          </a>
        @else
          <a class="topbar-cta ms-md-1" href="{{ url('/contact') }}">
            <i class="bi bi-send"></i>
            <span>Get Quote</span>
          </a>
        @endif

      </div>

    </div>
  </div>
</div>

<!-- Navbar (Premium) -->
<nav class="navbar navbar-expand-lg navbar-premium sticky-top">
  <div class="container">

    <!-- Logo only -->
    <a class="navbar-brand d-flex align-items-center"
       href="{{ url('/') }}"
       aria-label="{{ $websiteSetting->site_name ?? 'Sharda Placement' }}">
      <img src="{{ $websiteSetting->logo_url ?? asset('assets/img/logo.png') }}"
           alt="{{ $websiteSetting->site_name ?? 'Sharda Placement' }}"
           class="brand-logo">
    </a>

    <button class="navbar-toggler premium-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navMain"
            aria-controls="navMain"
            aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav mx-lg-auto mb-2 mb-lg-0 gap-lg-1">

        <li class="nav-item">
          <a class="nav-link nav-link-premium {{ request()->is('/') ? 'active' : '' }}"
             href="{{ url('/') }}">
            Home
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link nav-link-premium {{ request()->is('about') ? 'active' : '' }}"
             href="{{ url('/about') }}">
            About
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link nav-link-premium {{ request()->is('services') ? 'active' : '' }}"
             href="{{ url('/services') }}">
            Services
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link nav-link-premium {{ request()->is('industries') ? 'active' : '' }}"
             href="{{ url('/industries') }}">
            Industries
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link nav-link-premium {{ request()->is('jobs') ? 'active' : '' }}"
             href="{{ url('/jobs') }}">
            Jobs
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link nav-link-premium {{ request()->is('contact') ? 'active' : '' }}"
             href="{{ url('/contact') }}">
            Contact
          </a>
        </li>

      </ul>

      <div class="d-flex gap-2 align-items-center">

        @if(!empty($websiteSetting->nav_button_1_text))
          <a class="btn btn-nav-ghost"
             href="{{ url($websiteSetting->nav_button_1_link ?? '/jobs') }}">
            <i class="bi bi-search"></i>
            <span>{{ $websiteSetting->nav_button_1_text }}</span>
          </a>
        @else
          <a class="btn btn-nav-ghost" href="{{ url('/jobs') }}">
            <i class="bi bi-search"></i>
            <span>Browse Jobs</span>
          </a>
        @endif

        @if(!empty($websiteSetting->nav_button_2_text))
          <a class="btn btn-nav-cta"
             href="{{ url($websiteSetting->nav_button_2_link ?? '/contact') }}">
            <i class="bi bi-send"></i>
            <span>{{ $websiteSetting->nav_button_2_text }}</span>
          </a>
        @else
          <a class="btn btn-nav-cta" href="{{ url('/contact') }}">
            <i class="bi bi-send"></i>
            <span>Post Requirement</span>
          </a>
        @endif

      </div>
    </div>

  </div>
</nav>




@yield('content')

<!-- FOOTER (Premium) -->
<footer class="footer-premium pt-5 pb-4">
  <div class="container">

    <div class="row g-4">

      <!-- Brand -->
      <div class="col-lg-4">
        <div class="footer-brand mb-3">
          <div class="fw-bold fs-5 text-white">
            {{ $websiteSetting->site_name ?? 'Sharda Placement' }}
          </div>
        </div>

        <p class="footer-desc">
          {{ $websiteSetting->footer_about_text ?? 'Reliable recruitment and manpower services for businesses across industries. We help companies scale with verified and role-matched workforce.' }}
        </p>

        <div class="footer-contact mt-3">
          @if(!empty($websiteSetting->address))
            <div>
              <i class="bi bi-geo-alt"></i>
              {{ $websiteSetting->address }}
            </div>
          @endif

          @if(!empty($websiteSetting->phone))
            <div>
              <i class="bi bi-telephone"></i>
              {{ $websiteSetting->phone }}
            </div>
          @endif

          @if(!empty($websiteSetting->email))
            <div>
              <i class="bi bi-envelope"></i>
              {{ $websiteSetting->email }}
            </div>
          @endif
        </div>

        <div class="footer-social mt-3">
          @if(!empty($websiteSetting->facebook_url))
            <a href="{{ $websiteSetting->facebook_url }}" target="_blank" aria-label="Facebook">
              <i class="bi bi-facebook"></i>
            </a>
          @endif

          @if(!empty($websiteSetting->instagram_url))
            <a href="{{ $websiteSetting->instagram_url }}" target="_blank" aria-label="Instagram">
              <i class="bi bi-instagram"></i>
            </a>
          @endif

          @if(!empty($websiteSetting->linkedin_url))
            <a href="{{ $websiteSetting->linkedin_url }}" target="_blank" aria-label="LinkedIn">
              <i class="bi bi-linkedin"></i>
            </a>
          @endif

          @if(!empty($websiteSetting->whatsapp_link) && $websiteSetting->whatsapp_link !== '#')
            <a href="{{ $websiteSetting->whatsapp_link }}" target="_blank" aria-label="WhatsApp">
              <i class="bi bi-whatsapp"></i>
            </a>
          @endif
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-6 col-lg-2">
        <div class="footer-title">Quick Links</div>
        <ul class="footer-links">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('/about') }}">About</a></li>
          <li><a href="{{ url('/services') }}">Services</a></li>
          <li><a href="{{ url('/industries') }}">Industries</a></li>
          <li><a href="{{ url('/jobs') }}">Jobs</a></li>
          <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
      </div>

      <!-- Services -->
      <div class="col-6 col-lg-2">
        <div class="footer-title">Services</div>
        <ul class="footer-links">
          <li><a href="{{ url('/services') }}">Permanent Recruitment</a></li>
          <li><a href="{{ url('/services') }}">Temporary Staffing</a></li>
          <li><a href="{{ url('/services') }}">Bulk Hiring</a></li>
          <li><a href="{{ url('/services') }}">Facility Support</a></li>
        </ul>
      </div>

      <!-- Newsletter -->
      <div class="col-lg-4">
        <div class="footer-title">
          {{ $websiteSetting->newsletter_title ?? 'Newsletter' }}
        </div>

        <p class="footer-desc small">
          {{ $websiteSetting->newsletter_text ?? 'Get updates about new job openings and recruitment insights.' }}
        </p>

        <form class="footer-newsletter mt-3">
          <div class="input-group">
            <input type="email"
                   class="form-control"
                   placeholder="{{ $websiteSetting->newsletter_placeholder ?? 'Enter your email' }}">

            <button class="btn btn-footer-primary" type="button">
              <i class="bi bi-send"></i>
            </button>
          </div>
        </form>

        <div class="footer-note mt-3">
          <i class="bi bi-shield-check"></i>
          {{ $websiteSetting->privacy_text ?? 'We respect your privacy.' }}
        </div>
      </div>

    </div>

    <div class="footer-divider my-4"></div>

    <div class="footer-bottom d-flex flex-wrap justify-content-between align-items-center gap-2">
      <div>
        © <span id="yr"></span>
        {{ $websiteSetting->site_name ?? 'Sharda Placement' }}.
        {{ $websiteSetting->copyright_text ?? 'All rights reserved.' }}
      </div>

      <div class="d-flex gap-3">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
      </div>
    </div>

  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>