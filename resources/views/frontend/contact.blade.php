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
          <i class="bi bi-chat-dots"></i>
          Contact
          <span class="hero-badge-dot"></span>
        </div>

        <h1 class="hero-title fw-bold lh-1 mb-3">
          Let’s discuss your requirement
          <span class="hero-title-gradient">or job application</span>
        </h1>

        <p class="hero-subtitle text-muted-2 mb-0">
          Share manpower needs, headcount, roles, and location — or apply for a job.
          Our team will contact you within business hours.
        </p>

        <nav aria-label="breadcrumb" class="mt-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ url('/') }}" class="text-decoration-none">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
          </ol>
        </nav>
      </div>

      <div class="col-lg-4">
        <div class="card card-soft p-4">
          <div class="fw-semibold mb-1">Quick Actions</div>
          <div class="small text-muted-2">Call, WhatsApp or email</div>

          <div class="d-grid gap-2 mt-3">
            @if($websiteSetting->phone)
              <a class="btn btn-hero-primary btn-lg" href="{{ $websiteSetting->phone_link }}">
                <i class="bi bi-telephone"></i> Call Now
              </a>
            @endif

            @if($websiteSetting->whatsapp_link && $websiteSetting->whatsapp_link !== '#')
              <a class="btn btn-hero-secondary btn-lg" href="{{ $websiteSetting->whatsapp_link }}" target="_blank">
                <i class="bi bi-whatsapp"></i> WhatsApp
              </a>
            @endif

            @if($websiteSetting->email)
              <a class="btn btn-hero-secondary btn-lg" href="{{ $websiteSetting->email_link }}">
                <i class="bi bi-envelope"></i> Email
              </a>
            @endif
          </div>

          @if($websiteSetting->office_hours)
            <div class="p-3 bg-soft rounded-4 mt-3">
              <div class="fw-semibold">Office Hours</div>
              <div class="small text-muted-2">{{ $websiteSetting->office_hours }}</div>
            </div>
          @endif
        </div>
      </div>

    </div>
  </div>
</header>

<!-- CONTACT CONTENT -->
<section class="section contact-premium" id="contactForm" style="padding-top: 40px;">
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

          @if($websiteSetting->whatsapp_link && $websiteSetting->whatsapp_link !== '#')
            <a class="contact-action-btn" href="{{ $websiteSetting->whatsapp_link }}" target="_blank">
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

        <!-- FAQ -->
        <div class="mt-4">
          <div class="fw-bold fs-5 mb-2">Quick FAQs</div>

          <div class="accordion" id="faqContact">

            <div class="accordion-item">
              <h2 class="accordion-header" id="q1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#a1" aria-expanded="true" aria-controls="a1">
                  How fast will you respond?
                </button>
              </h2>
              <div id="a1" class="accordion-collapse collapse show" aria-labelledby="q1" data-bs-parent="#faqContact">
                <div class="accordion-body text-muted-2">
                  Within business hours. Urgent requirements can be prioritized.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="q2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a2" aria-expanded="false" aria-controls="a2">
                  What should employers share in the message?
                </button>
              </h2>
              <div id="a2" class="accordion-collapse collapse" aria-labelledby="q2" data-bs-parent="#faqContact">
                <div class="accordion-body text-muted-2">
                  Role name, headcount, location, salary range optional and joining timeline.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="q3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a3" aria-expanded="false" aria-controls="a3">
                  Is resume mandatory for candidates?
                </button>
              </h2>
              <div id="a3" class="accordion-collapse collapse" aria-labelledby="q3" data-bs-parent="#faqContact">
                <div class="accordion-body text-muted-2">
                  No. You can apply without resume. Add it if available to speed up screening.
                </div>
              </div>
            </div>

          </div>
        </div>
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

        <!-- Premium note card -->
        <div class="card card-soft p-4 mt-4">
          <div class="d-flex gap-3">
            <div class="icon-pill"><i class="bi bi-stars"></i></div>
            <div>
              <div class="fw-semibold">Premium Support</div>
              <div class="text-muted-2 small">
                If hiring is urgent, mention “Urgent” in the message — we’ll prioritize coordination.
              </div>
            </div>
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
            <span class="trust-icon"><i class="bi bi-stars"></i></span>
            Want to hire faster?
          </div>
          <div class="trust-sub text-muted-2">
            Share your requirement — we’ll coordinate shortlisting and interviews quickly.
          </div>
        </div>

        <div class="col-lg-4 text-lg-end">
          <a href="{{ url('/services') }}" class="btn btn-hero-secondary btn-lg">
            <i class="bi bi-layers"></i> Services
          </a>
          <a href="{{ url('/jobs') }}" class="btn btn-hero-primary btn-lg ms-2">
            <i class="bi bi-search"></i> Browse Jobs
          </a>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection