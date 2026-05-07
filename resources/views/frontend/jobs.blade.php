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
          <i class="bi bi-briefcase"></i>
          Job Openings
          <span class="hero-badge-dot"></span>
        </div>

        <h1 class="hero-title fw-bold lh-1 mb-3">
          Find verified openings
          <span class="hero-title-gradient">and apply fast</span>
        </h1>

        <p class="hero-subtitle text-muted-2 mb-0">
          Browse sample jobs (UI). Later we’ll connect to real job posting and application data.
        </p>

        <nav aria-label="breadcrumb" class="mt-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.html#home" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jobs</li>
          </ol>
        </nav>
      </div>

      <div class="col-lg-4">
        <div class="card card-soft p-4">
          <div class="fw-semibold mb-1">Apply via Contact</div>
          <div class="small text-muted-2">Send resume (optional) + details</div>

          <div class="row g-3 mt-2">
            <div class="col-6">
              <div class="metric">
                <div class="fw-bold fs-4">Fast</div>
                <div class="small text-muted-2">Response</div>
              </div>
            </div>
            <div class="col-6">
              <div class="metric">
                <div class="fw-bold fs-4">NCR</div>
                <div class="small text-muted-2">Locations</div>
              </div>
            </div>
            <div class="col-12">
              <div class="p-3 bg-soft rounded-4">
                <div class="fw-semibold">Tip</div>
                <div class="small text-muted-2">Mention job title + location while applying.</div>
              </div>
            </div>
          </div>

          <div class="d-grid mt-3">
            <a href="index.html#contact" class="btn btn-hero-primary btn-lg">
              <i class="bi bi-send"></i> Apply Now
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</header>

<!-- FILTER BAR -->
<section class="section jobs-premium" style="padding-top: 40px;">
  <div class="container">

    <div class="jobs-filter card-soft p-3 p-md-4 mb-4">
      <div class="row g-2 align-items-center">
        <div class="col-md-4">
          <div class="input-icon">
            <i class="bi bi-search"></i>
            <input class="form-control form-control-lg" placeholder="Job title (e.g., driver, helper)">
          </div>
        </div>

        <div class="col-md-3">
          <div class="input-icon">
            <i class="bi bi-geo-alt"></i>
            <input class="form-control form-control-lg" placeholder="Location (e.g., Noida)">
          </div>
        </div>

        <div class="col-md-3">
          <select class="form-select form-select-lg">
            <option selected>Industry</option>
            <option>Manufacturing</option>
            <option>Warehouse</option>
            <option>Logistics</option>
            <option>Security</option>
            <option>Hospitality</option>
            <option>Healthcare</option>
            <option>Retail</option>
            <option>Corporate/Office</option>
          </select>
        </div>

        <div class="col-md-2 d-grid">
          <button class="btn btn-hero-primary btn-lg" type="button">
            <i class="bi bi-funnel"></i> Filter
          </button>
        </div>
      </div>

      <div class="d-flex flex-wrap gap-2 mt-3">
        <span class="jobs-chip"><i class="bi bi-lightning-charge"></i> Urgent Hiring</span>
        <span class="jobs-chip"><i class="bi bi-patch-check"></i> Verified Openings</span>
        <span class="jobs-chip"><i class="bi bi-building-check"></i> Multiple Industries</span>
        <span class="jobs-chip"><i class="bi bi-clock"></i> New Jobs</span>
      </div>
    </div>

    <div class="row g-4 align-items-start">
      <!-- LEFT: Job cards -->
      <div class="col-lg-8">
        <div class="row g-4">

          <!-- Job card -->
          <div class="col-md-6">
            <div class="job-premium-card hover-lift h-100">
              <div class="job-top">
                <span class="job-tag"><i class="bi bi-briefcase"></i> Full-time</span>
                <span class="job-meta"><i class="bi bi-geo-alt"></i> Noida</span>
              </div>

              <div class="job-title">Field Executive</div>
              <div class="job-sub text-muted-2">Industry: Logistics • Experience: 0–2 yrs</div>

              <div class="job-chips mt-3">
                <span class="job-chip"><i class="bi bi-currency-rupee"></i> As per interview</span>
                <span class="job-chip"><i class="bi bi-clock"></i> Posted: 2 days ago</span>
              </div>

              <div class="job-actions mt-4">
                <button class="btn btn-sm btn-hero-secondary" data-bs-toggle="modal" data-bs-target="#jobModal">
                  <i class="bi bi-eye"></i> Details
                </button>
                <a class="btn btn-sm btn-hero-primary" href="index.html#contact">
                  <i class="bi bi-send"></i> Apply
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="job-premium-card hover-lift h-100">
              <div class="job-top">
                <span class="job-tag"><i class="bi bi-file-earmark-text"></i> Contract</span>
                <span class="job-meta"><i class="bi bi-geo-alt"></i> Delhi</span>
              </div>

              <div class="job-title">Warehouse Supervisor</div>
              <div class="job-sub text-muted-2">Industry: Warehouse • Experience: 1–3 yrs</div>

              <div class="job-chips mt-3">
                <span class="job-chip"><i class="bi bi-currency-rupee"></i> 18k–25k</span>
                <span class="job-chip"><i class="bi bi-clock"></i> Posted: 5 days ago</span>
              </div>

              <div class="job-actions mt-4">
                <button class="btn btn-sm btn-hero-secondary" data-bs-toggle="modal" data-bs-target="#jobModal">
                  <i class="bi bi-eye"></i> Details
                </button>
                <a class="btn btn-sm btn-hero-primary" href="index.html#contact">
                  <i class="bi bi-send"></i> Apply
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="job-premium-card hover-lift h-100">
              <div class="job-top">
                <span class="job-tag"><i class="bi bi-stopwatch"></i> Part-time</span>
                <span class="job-meta"><i class="bi bi-geo-alt"></i> Gurgaon</span>
              </div>

              <div class="job-title">Accountant</div>
              <div class="job-sub text-muted-2">Industry: Corporate • Skills: Tally/Excel</div>

              <div class="job-chips mt-3">
                <span class="job-chip"><i class="bi bi-currency-rupee"></i> 20k–30k</span>
                <span class="job-chip"><i class="bi bi-clock"></i> Posted: 1 week ago</span>
              </div>

              <div class="job-actions mt-4">
                <button class="btn btn-sm btn-hero-secondary" data-bs-toggle="modal" data-bs-target="#jobModal">
                  <i class="bi bi-eye"></i> Details
                </button>
                <a class="btn btn-sm btn-hero-primary" href="index.html#contact">
                  <i class="bi bi-send"></i> Apply
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="job-premium-card hover-lift h-100">
              <div class="job-top">
                <span class="job-tag"><i class="bi bi-briefcase"></i> Full-time</span>
                <span class="job-meta"><i class="bi bi-geo-alt"></i> Noida</span>
              </div>

              <div class="job-title">Security Guard</div>
              <div class="job-sub text-muted-2">Industry: Security • Experience: 0–2 yrs</div>

              <div class="job-chips mt-3">
                <span class="job-chip"><i class="bi bi-currency-rupee"></i> 14k–18k</span>
                <span class="job-chip"><i class="bi bi-clock"></i> Posted: 3 days ago</span>
              </div>

              <div class="job-actions mt-4">
                <button class="btn btn-sm btn-hero-secondary" data-bs-toggle="modal" data-bs-target="#jobModal">
                  <i class="bi bi-eye"></i> Details
                </button>
                <a class="btn btn-sm btn-hero-primary" href="index.html#contact">
                  <i class="bi bi-send"></i> Apply
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="job-premium-card hover-lift h-100">
              <div class="job-top">
                <span class="job-tag"><i class="bi bi-file-earmark-text"></i> Contract</span>
                <span class="job-meta"><i class="bi bi-geo-alt"></i> Delhi</span>
              </div>

              <div class="job-title">Delivery Executive</div>
              <div class="job-sub text-muted-2">Industry: Logistics • Experience: 0–1 yrs</div>

              <div class="job-chips mt-3">
                <span class="job-chip"><i class="bi bi-currency-rupee"></i> 15k–22k</span>
                <span class="job-chip"><i class="bi bi-clock"></i> Posted: 1 day ago</span>
              </div>

              <div class="job-actions mt-4">
                <button class="btn btn-sm btn-hero-secondary" data-bs-toggle="modal" data-bs-target="#jobModal">
                  <i class="bi bi-eye"></i> Details
                </button>
                <a class="btn btn-sm btn-hero-primary" href="index.html#contact">
                  <i class="bi bi-send"></i> Apply
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="job-premium-card hover-lift h-100">
              <div class="job-top">
                <span class="job-tag"><i class="bi bi-briefcase"></i> Full-time</span>
                <span class="job-meta"><i class="bi bi-geo-alt"></i> Gurgaon</span>
              </div>

              <div class="job-title">Helper / Loader</div>
              <div class="job-sub text-muted-2">Industry: Warehouse • Experience: 0–2 yrs</div>

              <div class="job-chips mt-3">
                <span class="job-chip"><i class="bi bi-currency-rupee"></i> 12k–16k</span>
                <span class="job-chip"><i class="bi bi-clock"></i> Posted: 4 days ago</span>
              </div>

              <div class="job-actions mt-4">
                <button class="btn btn-sm btn-hero-secondary" data-bs-toggle="modal" data-bs-target="#jobModal">
                  <i class="bi bi-eye"></i> Details
                </button>
                <a class="btn btn-sm btn-hero-primary" href="index.html#contact">
                  <i class="bi bi-send"></i> Apply
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="job-premium-card hover-lift h-100">
              <div class="job-top">
                <span class="job-tag"><i class="bi bi-stopwatch"></i> Part-time</span>
                <span class="job-meta"><i class="bi bi-geo-alt"></i> Noida</span>
              </div>

              <div class="job-title">Office Boy</div>
              <div class="job-sub text-muted-2">Industry: Corporate • Experience: 0–2 yrs</div>

              <div class="job-chips mt-3">
                <span class="job-chip"><i class="bi bi-currency-rupee"></i> 10k–14k</span>
                <span class="job-chip"><i class="bi bi-clock"></i> Posted: 6 days ago</span>
              </div>

              <div class="job-actions mt-4">
                <button class="btn btn-sm btn-hero-secondary" data-bs-toggle="modal" data-bs-target="#jobModal">
                  <i class="bi bi-eye"></i> Details
                </button>
                <a class="btn btn-sm btn-hero-primary" href="index.html#contact">
                  <i class="bi bi-send"></i> Apply
                </a>
              </div>
            </div>
          </div>

        </div>

        <!-- Pagination -->
        <nav class="mt-5" aria-label="Jobs pagination">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
      </div>

      <!-- RIGHT: Sticky Sidebar -->
      <div class="col-lg-4">
        <div class="position-sticky" style="top: 110px;">
          <div class="jobs-side card-soft p-4 mb-4 position-relative overflow-hidden">
            <div class="jobs-side-glow"></div>

            <span class="badge jobs-side-badge mb-3">
              <i class="bi bi-send"></i> Apply Support
            </span>

            <h4 class="fw-bold mb-2">Apply in 1 minute</h4>
            <p class="text-muted-2 mb-3">
              Use the Contact form to apply. Mention the job title and location for faster processing.
            </p>

            <div class="jobs-side-points">
              <div class="jobs-side-point"><i class="bi bi-check2-circle"></i> Resume optional</div>
              <div class="jobs-side-point"><i class="bi bi-check2-circle"></i> Verified openings</div>
              <div class="jobs-side-point"><i class="bi bi-check2-circle"></i> Quick response</div>
            </div>

            <div class="d-grid mt-4">
              <a href="index.html#contact" class="btn btn-hero-primary btn-lg">
                <i class="bi bi-send"></i> Apply via Contact
              </a>
            </div>

            <div class="text-center mt-3 small text-muted-2">
              Available Mon–Sat • 10 AM – 7 PM
            </div>
          </div>

          <div class="card card-soft p-4">
            <div class="fw-semibold mb-2"><i class="bi bi-info-circle"></i> Candidate Tips</div>
            <ul class="mb-0 text-muted-2 small ps-3">
              <li>Keep phone number active for calls/WhatsApp.</li>
              <li>Mention experience and expected salary.</li>
              <li>Share location preference clearly.</li>
              <li>Attach resume if available (PDF/DOC).</li>
            </ul>
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
            Are you an employer?
          </div>
          <div class="trust-sub text-muted-2">
            Share your requirement — we’ll shortlist and coordinate interviews quickly.
          </div>
        </div>
        <div class="col-lg-4 text-lg-end">
          <a href="index.html#contact" class="btn btn-hero-primary btn-lg">
            <i class="bi bi-send"></i> Post Requirement
          </a>
          <a href="services.html" class="btn btn-hero-secondary btn-lg ms-2">
            <i class="bi bi-layers"></i> Services
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- JOB DETAILS MODAL (UI only) -->
<div class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content card-soft" style="border: 0;">
      <div class="modal-header border-0">
        <div>
          <h5 class="modal-title fw-bold" id="jobModalLabel">Job Details (Sample)</h5>
          <div class="small text-muted-2">This is placeholder UI. Later will load dynamic data.</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body pt-0">
        <div class="d-flex flex-wrap gap-2 mb-3">
          <span class="job-tag"><i class="bi bi-briefcase"></i> Full-time</span>
          <span class="job-chip"><i class="bi bi-geo-alt"></i> Noida</span>
          <span class="job-chip"><i class="bi bi-currency-rupee"></i> As per interview</span>
          <span class="job-chip"><i class="bi bi-clock"></i> Posted: 2 days ago</span>
        </div>

        <div class="fw-semibold mb-2">Responsibilities</div>
        <ul class="text-muted-2 small ps-3">
          <li>Coordinate field tasks as assigned by supervisor.</li>
          <li>Report daily work updates.</li>
          <li>Basic communication with team.</li>
        </ul>

        <div class="fw-semibold mb-2 mt-3">Requirements</div>
        <ul class="text-muted-2 small ps-3">
          <li>0–2 years experience (freshers can apply).</li>
          <li>Basic communication skills.</li>
          <li>Willing to travel locally.</li>
        </ul>

        <div class="p-3 bg-soft rounded-4 mt-3">
          <div class="fw-semibold">How to apply</div>
          <div class="small text-muted-2">
            Click “Apply” and submit your details in Contact form. Mention the job title and location.
          </div>
        </div>
      </div>

      <div class="modal-footer border-0">
        <a href="index.html#contact" class="btn btn-hero-primary">
          <i class="bi bi-send"></i> Apply via Contact
        </a>
        <button type="button" class="btn btn-hero-secondary" data-bs-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>

@endsection