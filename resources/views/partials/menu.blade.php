<aside id="sidebar">

    {{-- BRAND --}}
    <div class="sidebar-brand">
        <div class="brand-area">
            <div class="brand-icon">
                <i class="fas fa-bolt"></i>
            </div>

            <span class="brand-text">
                {{ trans('panel.site_title') }}
            </span>
        </div>
    </div>

    {{-- USER MINI CARD --}}
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        <div class="user-meta">
            <p class="user-name">{{ auth()->user()->name }}</p>
            <p class="user-role">Administrator</p>
        </div>
    </div>

    {{-- NAV --}}
    <nav class="sidebar-nav">

        <p class="sidebar-section-title nav-label">Main</p>

        {{-- Dashboard --}}
        <a href="{{ route('admin.home') }}"
           data-tooltip="Dashboard"
           class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <i class="fas fa-chart-pie nav-icon"></i>
            <span class="nav-label">{{ trans('global.dashboard') }}</span>
        </a>

        {{-- USER MANAGEMENT GROUP --}}
        @can('user_management_access')
            @php
                $umActive = request()->is('admin/permissions*')
                    || request()->is('admin/roles*')
                    || request()->is('admin/users*')
                    || request()->is('admin/audit-logs*');
            @endphp

            <div x-data="{ open: {{ $umActive ? 'true' : 'false' }} }">

                <button type="button"
                        @click="open = !open"
                        data-tooltip="Users"
                        class="nav-link nav-group-btn {{ $umActive ? 'active' : '' }}">

                    <div class="nav-group-left">
                        <i class="fas fa-users nav-icon"></i>
                        <span class="nav-label">{{ trans('cruds.userManagement.title') }}</span>
                    </div>

                    <i class="fas fa-chevron-right chevron"
                       :style="open ? 'transform:rotate(90deg)' : ''"></i>
                </button>

                <div class="submenu"
                     x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-1">

                    @can('permission_access')
                        <a href="{{ route('admin.permissions.index') }}"
                           class="sub-link {{ request()->is('admin/permissions*') ? 'active' : '' }}">
                            <i class="fas fa-key"></i>
                            {{ trans('cruds.permission.title') }}
                        </a>
                    @endcan

                    @can('role_access')
                        <a href="{{ route('admin.roles.index') }}"
                           class="sub-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                            <i class="fas fa-shield-alt"></i>
                            {{ trans('cruds.role.title') }}
                        </a>
                    @endcan

                    @can('user_access')
                        <a href="{{ route('admin.users.index') }}"
                           class="sub-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                            <i class="fas fa-user-circle"></i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    @endcan

                    @can('audit_log_access')
                        <a href="{{ route('admin.audit-logs.index') }}"
                           class="sub-link {{ request()->is('admin/audit-logs*') ? 'active' : '' }}">
                            <i class="fas fa-history"></i>
                            {{ trans('cruds.auditLog.title') }}
                        </a>
                    @endcan

                </div>
            </div>
        @endcan

        {{-- ABOUT CMS GROUP --}}
@can('about_page_access')
    @php
        $aboutActive = request()->is('admin/about-page*')
            || request()->is('admin/about-features*')
            || request()->is('admin/about-tags*')
            || request()->is('admin/about-values*')
            || request()->is('admin/about-processes*');
    @endphp

    <div x-data="{ open: {{ $aboutActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="About CMS"
                class="nav-link nav-group-btn {{ $aboutActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-info-circle nav-icon"></i>
                <span class="nav-label">About CMS</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('about_page_edit')
                <a href="{{ route('admin.about-page.edit') }}"
                   class="sub-link {{ request()->is('admin/about-page*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i>
                    Main About Page
                </a>
            @endcan

            @can('about_feature_access')
                <a href="{{ route('admin.about-features.index') }}"
                   class="sub-link {{ request()->is('admin/about-features*') ? 'active' : '' }}">
                    <i class="fas fa-layer-group"></i>
                    Story Features
                </a>
            @endcan

            @can('about_tag_access')
                <a href="{{ route('admin.about-tags.index') }}"
                   class="sub-link {{ request()->is('admin/about-tags*') ? 'active' : '' }}">
                    <i class="fas fa-tags"></i>
                    Mission Tags
                </a>
            @endcan

            @can('about_value_access')
                <a href="{{ route('admin.about-values.index') }}"
                   class="sub-link {{ request()->is('admin/about-values*') ? 'active' : '' }}">
                    <i class="fas fa-gem"></i>
                    Values
                </a>
            @endcan

            @can('about_process_access')
                <a href="{{ route('admin.about-processes.index') }}"
                   class="sub-link {{ request()->is('admin/about-processes*') ? 'active' : '' }}">
                    <i class="fas fa-route"></i>
                    Process Steps
                </a>
            @endcan

        </div>
    </div>
@endcan

{{-- INDUSTRIES CMS GROUP --}}
@can('industry_page_access')
    @php
        $industryActive = request()->is('admin/industry-page*')
            || request()->is('admin/industries*')
            || request()->is('admin/industry-roles*')
            || request()->is('admin/industry-processes*');
    @endphp

    <div x-data="{ open: {{ $industryActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Industries CMS"
                class="nav-link nav-group-btn {{ $industryActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-industry nav-icon"></i>
                <span class="nav-label">Industries CMS</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('industry_page_edit')
                <a href="{{ route('admin.industry-page.edit') }}"
                   class="sub-link {{ request()->is('admin/industry-page*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i>
                    Main Industry Page
                </a>
            @endcan

            @can('industry_access')
                <a href="{{ route('admin.industries.index') }}"
                   class="sub-link {{ request()->is('admin/industries*') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i>
                    Industries
                </a>
            @endcan

            @can('industry_role_access')
                <a href="{{ route('admin.industry-roles.index') }}"
                   class="sub-link {{ request()->is('admin/industry-roles*') ? 'active' : '' }}">
                    <i class="fas fa-user-tag"></i>
                    Industry Roles
                </a>
            @endcan

            @can('industry_process_access')
                <a href="{{ route('admin.industry-processes.index') }}"
                   class="sub-link {{ request()->is('admin/industry-processes*') ? 'active' : '' }}">
                    <i class="fas fa-route"></i>
                    Process Steps
                </a>
            @endcan

        </div>
    </div>
@endcan

{{-- SERVICES CMS GROUP --}}
@can('service_page_access')
    @php
        $serviceActive = request()->is('admin/service-page*')
            || request()->is('admin/services*')
            || request()->is('admin/service-feature-points*')
            || request()->is('admin/service-processes*');
    @endphp

    <div x-data="{ open: {{ $serviceActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Services CMS"
                class="nav-link nav-group-btn {{ $serviceActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-layer-group nav-icon"></i>
                <span class="nav-label">Services CMS</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('service_page_edit')
                <a href="{{ route('admin.service-page.edit') }}"
                   class="sub-link {{ request()->is('admin/service-page*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i>
                    Main Service Page
                </a>
            @endcan

            @can('service_access')
                <a href="{{ route('admin.services.index') }}"
                   class="sub-link {{ request()->is('admin/services*') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i>
                    Services
                </a>
            @endcan

            @can('service_feature_point_access')
                <a href="{{ route('admin.service-feature-points.index') }}"
                   class="sub-link {{ request()->is('admin/service-feature-points*') ? 'active' : '' }}">
                    <i class="fas fa-check-circle"></i>
                    Featured Points
                </a>
            @endcan

            @can('service_process_access')
                <a href="{{ route('admin.service-processes.index') }}"
                   class="sub-link {{ request()->is('admin/service-processes*') ? 'active' : '' }}">
                    <i class="fas fa-route"></i>
                    Process Steps
                </a>
            @endcan

        </div>
    </div>
@endcan

{{-- JOBS CMS GROUP --}}
@can('job_page_access')
    @php
        $jobActive = request()->is('admin/job-page*')
            || request()->is('admin/jobs*');
    @endphp

    <div x-data="{ open: {{ $jobActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Jobs CMS"
                class="nav-link nav-group-btn {{ $jobActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-briefcase nav-icon"></i>
                <span class="nav-label">Jobs CMS</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('job_page_edit')
                <a href="{{ route('admin.job-page.edit') }}"
                   class="sub-link {{ request()->is('admin/job-page*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i>
                    Main Job Page
                </a>
            @endcan

            @can('job_access')
                <a href="{{ route('admin.jobs.index') }}"
                   class="sub-link {{ request()->is('admin/jobs*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase"></i>
                    Jobs
                </a>
            @endcan

        </div>
    </div>
@endcan 


        <div class="nav-divider"></div>

        <p class="sidebar-section-title compact nav-label">Account</p>

        {{-- Change Password --}}
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <a href="{{ route('profile.password.edit') }}"
                   data-tooltip="Password"
                   class="nav-link {{ request()->is('profile/password*') ? 'active' : '' }}">
                    <i class="fas fa-key nav-icon"></i>
                    <span class="nav-label">{{ trans('global.change_password') }}</span>
                </a>
            @endcan
        @endif

        {{-- Settings --}}
        <a href="#"
           data-tooltip="Settings"
           class="nav-link">
            <i class="fas fa-cog nav-icon"></i>
            <span class="nav-label">Settings</span>
        </a>

    </nav>

    {{-- LOGOUT --}}
    <div class="sidebar-footer">
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
           data-tooltip="Logout"
           class="nav-link logout-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <span class="nav-label">{{ trans('global.logout') }}</span>
        </a>
    </div>

</aside>