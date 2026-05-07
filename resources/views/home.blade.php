@extends('layouts.admin')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --accent:       #4F46E5;
        --accent-light: #EEF2FF;
        --accent-dark:  #3730A3;
        --sidebar-bg:   #0F172A;
    }

    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .stat-card {
        background: #fff;
        border-radius: 14px;
        padding: 1.25rem 1.5rem;
        border: 1px solid #E5E7EB;
        position: relative;
        overflow: hidden;
        transition: transform .2s, box-shadow .2s;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(0,0,0,.08);
    }

    .stat-card .icon-wrap {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--accent-light);
        color: var(--accent);
        font-size: 20px;
    }

    .stat-card .badge-up {
        color: #16A34A;
        background: #DCFCE7;
    }

    .stat-card .badge-down {
        color: #DC2626;
        background: #FEE2E2;
    }

    .stat-card .badge {
        padding: 2px 8px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .chart-card {
        background: #fff;
        border-radius: 14px;
        padding: 1.25rem 1.5rem;
        border: 1px solid #E5E7EB;
    }

    .dash-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13.5px;
    }

    .dash-table th {
        background: #F8FAFC;
        color: #6B7280;
        font-weight: 600;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .05em;
        padding: 10px 16px;
        border-bottom: 1px solid #E5E7EB;
    }

    .dash-table td {
        padding: 11px 16px;
        border-bottom: 1px solid #F3F4F6;
        color: #374151;
        vertical-align: middle;
    }

    .dash-table tr:last-child td {
        border-bottom: none;
    }

    .dash-table tr:hover td {
        background: #F9FAFB;
    }

    .pill {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .pill-green  { background: #DCFCE7; color: #15803D; }
    .pill-yellow { background: #FEF9C3; color: #A16207; }
    .pill-red    { background: #FEE2E2; color: #B91C1C; }
    .pill-blue   { background: #DBEAFE; color: #1D4ED8; }

    .avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 700;
        color: #fff;
        background: var(--accent);
        flex-shrink: 0;
    }

    #theme-panel {
        position: fixed;
        right: -280px;
        top: 0;
        height: 100vh;
        width: 280px;
        z-index: 999;
        background: #fff;
        box-shadow: -4px 0 30px rgba(0,0,0,.12);
        transition: right .3s ease;
        padding: 0;
        display: flex;
        flex-direction: column;
    }

    #theme-panel.open { right: 0; }

    #theme-toggle-btn {
        position: fixed;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        background: var(--accent);
        color: #fff;
        border: none;
        cursor: pointer;
        padding: 14px 10px;
        border-radius: 10px 0 0 10px;
        z-index: 1000;
        font-size: 16px;
        box-shadow: -2px 2px 12px rgba(0,0,0,.2);
        transition: background .2s;
    }

    .color-swatch {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        cursor: pointer;
        border: 3px solid transparent;
        transition: transform .15s, border-color .15s;
        display: inline-block;
    }

    .color-swatch:hover { transform: scale(1.1); }
    .color-swatch.active { border-color: #374151 !important; }

    .welcome-banner {
        background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);
        border-radius: 16px;
        padding: 1.5rem 2rem;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .welcome-banner::before {
        content: '';
        position: absolute;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: rgba(255,255,255,.08);
        right: -40px;
        top: -60px;
    }

    .welcome-banner::after {
        content: '';
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
        right: 80px;
        top: 20px;
    }

    .progress-bar {
        height: 6px;
        background: #E5E7EB;
        border-radius: 3px;
        overflow: hidden;
    }

    .progress-bar-fill {
        height: 100%;
        background: var(--accent);
        border-radius: 3px;
        transition: width .6s ease;
    }

    @media(max-width: 992px) {
        .stat-grid {
            grid-template-columns: repeat(2, 1fr) !important;
        }

        .chart-grid,
        .dash-grid,
        .mini-grid {
            grid-template-columns: 1fr !important;
        }
    }

    @media(max-width: 576px) {
        .stat-grid {
            grid-template-columns: 1fr !important;
        }

        .welcome-banner {
            padding: 1.25rem;
        }
    }
</style>
@endsection

@section('content')

<button id="theme-toggle-btn" onclick="toggleTheme()" title="Customize Theme">
    <i class="fas fa-palette"></i>
</button>

<div id="theme-panel">
    <div style="background: var(--accent); color:#fff; padding: 1rem 1.25rem; display:flex; justify-content:space-between; align-items:center;">
        <div>
            <p style="font-weight:700; font-size:15px; margin:0;">Theme Customizer</p>
            <p style="font-size:12px; opacity:.8; margin:0;">Personalize your dashboard</p>
        </div>

        <button onclick="toggleTheme()" style="background:rgba(255,255,255,.2); border:none; color:#fff; width:28px; height:28px; border-radius:6px; cursor:pointer; font-size:14px;">
            ✕
        </button>
    </div>

    <div style="padding: 1.25rem; overflow-y:auto; flex:1;">
        <p style="font-size: 12px; font-weight: 700; color: #6B7280; text-transform: uppercase; letter-spacing: .06em; margin: 0 0 10px;">
            Accent Color
        </p>

        <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 1.5rem;">
            <div class="color-swatch active" style="background:#4F46E5;" data-accent="#4F46E5" data-light="#EEF2FF" data-dark="#3730A3" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#0EA5E9;" data-accent="#0EA5E9" data-light="#E0F2FE" data-dark="#0284C7" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#10B981;" data-accent="#10B981" data-light="#D1FAE5" data-dark="#059669" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#F59E0B;" data-accent="#F59E0B" data-light="#FEF3C7" data-dark="#D97706" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#EF4444;" data-accent="#EF4444" data-light="#FEE2E2" data-dark="#DC2626" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#8B5CF6;" data-accent="#8B5CF6" data-light="#EDE9FE" data-dark="#7C3AED" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#EC4899;" data-accent="#EC4899" data-light="#FCE7F3" data-dark="#DB2777" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#14B8A6;" data-accent="#14B8A6" data-light="#CCFBF1" data-dark="#0F766E" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#F97316;" data-accent="#F97316" data-light="#FFEDD5" data-dark="#EA580C" onclick="setAccent(this)"></div>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <p style="font-size: 12px; font-weight: 700; color: #6B7280; text-transform: uppercase; letter-spacing: .06em; margin: 0 0 8px;">
                Custom Color
            </p>

            <div style="display:flex; gap:8px; align-items:center;">
                <input type="color" id="custom-color" value="#4F46E5"
                       style="width:42px; height:38px; border:1px solid #E5E7EB; border-radius:8px; cursor:pointer; padding:2px;"
                       oninput="applyCustomColor(this.value)">

                <span id="hex-display" style="font-size:13px; font-weight:600; color:#374151; font-family:monospace;">
                    #4F46E5
                </span>
            </div>
        </div>

        <p style="font-size: 12px; font-weight: 700; color: #6B7280; text-transform: uppercase; letter-spacing: .06em; margin: 0 0 10px;">
            Background Style
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-bottom: 1.5rem;">
            <button onclick="setBg('bg-gray-100')" id="bg-gray" class="theme-bg-btn active-bg"
                style="padding: 8px; border-radius: 8px; border: 2px solid var(--accent); background: #F3F4F6; font-size: 12px; font-weight: 600; cursor:pointer; color: #374151;">
                ☁ Light Gray
            </button>

            <button onclick="setBg('bg-white')" id="bg-white"
                style="padding: 8px; border-radius: 8px; border: 2px solid #E5E7EB; background: #fff; font-size: 12px; font-weight: 600; cursor:pointer; color: #374151;">
                ◻ White
            </button>

            <button onclick="setBg('bg-slate-800')" id="bg-dark"
                style="padding: 8px; border-radius: 8px; border: 2px solid #E5E7EB; background: #1E293B; font-size: 12px; font-weight: 600; cursor:pointer; color: #fff;">
                ◾ Dark
            </button>

            <button onclick="setBg('bg-blue-50')" id="bg-blue"
                style="padding: 8px; border-radius: 8px; border: 2px solid #E5E7EB; background: #EFF6FF; font-size: 12px; font-weight: 600; cursor:pointer; color: #1D4ED8;">
                💧 Blue Tint
            </button>
        </div>

        <p style="font-size: 12px; font-weight: 700; color: #6B7280; text-transform: uppercase; letter-spacing: .06em; margin: 0 0 8px;">
            Interface Size
        </p>

        <div style="display: flex; gap: 6px; margin-bottom: 1.5rem;">
            <button onclick="setSize('compact')" style="flex:1; padding:7px; border-radius:8px; border:1.5px solid #E5E7EB; font-size:12px; cursor:pointer; background:#fff; font-weight:600;">
                Compact
            </button>

            <button onclick="setSize('default')" style="flex:1; padding:7px; border-radius:8px; border:1.5px solid var(--accent); font-size:12px; cursor:pointer; background:var(--accent-light); font-weight:600; color:var(--accent);">
                Default
            </button>

            <button onclick="setSize('spacious')" style="flex:1; padding:7px; border-radius:8px; border:1.5px solid #E5E7EB; font-size:12px; cursor:pointer; background:#fff; font-weight:600;">
                Spacious
            </button>
        </div>

        <button onclick="resetTheme()"
            style="width:100%; padding:10px; background:#F3F4F6; border:none; border-radius:10px; font-size:13px; font-weight:600; color:#6B7280; cursor:pointer;">
            ↺ Reset to Default
        </button>
    </div>
</div>

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 style="font-size:22px; font-weight:700; color:#111827; margin:0;">
            Dashboard
        </h2>

        <p style="font-size:13px; color:#6B7280; margin:4px 0 0;">
            Welcome back, <strong>{{ auth()->user()->name }}</strong> — here's what's happening today.
        </p>
    </div>

    <div class="flex items-center gap-3">
        <span style="font-size:12px; color:#9CA3AF;">
            <i class="fas fa-clock mr-1"></i>
            {{ now()->format('D, d M Y') }}
        </span>
    </div>
</div>

<div class="welcome-banner mb-6">
    <div style="position:relative; z-index:1;">
        <p style="font-size:20px; font-weight:700; margin:0 0 4px;">
            Good {{ now()->hour < 12 ? 'Morning' : (now()->hour < 17 ? 'Afternoon' : 'Evening') }},
            {{ explode(' ', auth()->user()->name)[0] }}! 👋
        </p>

        <p style="font-size:13px; opacity:.85; margin:0 0 16px;">
            Your admin panel is running smoothly. Here's a summary of today's activity.
        </p>

        <div style="display:flex; gap:16px; flex-wrap:wrap;">
            <div style="background:rgba(255,255,255,.15); padding:8px 16px; border-radius:10px; backdrop-filter:blur(4px);">
                <span style="font-size:11px; opacity:.8; display:block;">Total Users</span>
                <span style="font-size:18px; font-weight:700;">{{ number_format($totalUsers ?? 0) }}</span>
            </div>

            <div style="background:rgba(255,255,255,.15); padding:8px 16px; border-radius:10px;">
                <span style="font-size:11px; opacity:.8; display:block;">New Inquiries</span>
                <span style="font-size:18px; font-weight:700;">{{ number_format($newInquiries ?? 0) }}</span>
            </div>

            <div style="background:rgba(255,255,255,.15); padding:8px 16px; border-radius:10px;">
                <span style="font-size:11px; opacity:.8; display:block;">Today's Users</span>
                <span style="font-size:18px; font-weight:700;">{{ number_format($todayUsers ?? 0) }}</span>
            </div>
        </div>
    </div>
</div>

<div class="stat-grid mb-6" style="display:grid; grid-template-columns:repeat(4,1fr); gap:16px;">

    <div class="stat-card">
        <div style="display:flex; justify-content:space-between; align-items:flex-start;">
            <div>
                <p style="font-size:12px; color:#6B7280; font-weight:600; margin:0 0 6px; text-transform:uppercase; letter-spacing:.05em;">Total Users</p>
                <p style="font-size:26px; font-weight:700; color:#111827; margin:0 0 8px; line-height:1;">{{ number_format($totalUsers ?? 0) }}</p>
                <span class="badge badge-up">{{ number_format($todayUsers ?? 0) }} added today</span>
            </div>

            <div class="icon-wrap">
                <i class="fas fa-users"></i>
            </div>
        </div>

        <div class="progress-bar mt-3">
            <div class="progress-bar-fill" style="width:72%"></div>
        </div>
    </div>

    <div class="stat-card">
        <div style="display:flex; justify-content:space-between; align-items:flex-start;">
            <div>
                <p style="font-size:12px; color:#6B7280; font-weight:600; margin:0 0 6px; text-transform:uppercase; letter-spacing:.05em;">Jobs</p>
                <p style="font-size:26px; font-weight:700; color:#111827; margin:0 0 8px; line-height:1;">{{ number_format($totalJobs ?? 0) }}</p>
                <span class="badge" style="background:#F3F4F6; color:#374151;">{{ number_format($activeJobs ?? 0) }} active jobs</span>
            </div>

            <div class="icon-wrap" style="background:#F0FDF4; color:#16A34A;">
                <i class="fas fa-briefcase"></i>
            </div>
        </div>

        <div class="progress-bar mt-3">
            <div class="progress-bar-fill" style="width:60%; background:#16A34A;"></div>
        </div>
    </div>

    <div class="stat-card">
        <div style="display:flex; justify-content:space-between; align-items:flex-start;">
            <div>
                <p style="font-size:12px; color:#6B7280; font-weight:600; margin:0 0 6px; text-transform:uppercase; letter-spacing:.05em;">Inquiries</p>
                <p style="font-size:26px; font-weight:700; color:#111827; margin:0 0 8px; line-height:1;">{{ number_format($totalInquiries ?? 0) }}</p>
                <span class="badge" style="background:#FEF3C7; color:#92400E;">{{ number_format($newInquiries ?? 0) }} new inquiries</span>
            </div>

            <div class="icon-wrap" style="background:#FFFBEB; color:#D97706;">
                <i class="fas fa-envelope-open-text"></i>
            </div>
        </div>

        <div class="progress-bar mt-3">
            <div class="progress-bar-fill" style="width:80%; background:#D97706;"></div>
        </div>
    </div>

    <div class="stat-card">
        <div style="display:flex; justify-content:space-between; align-items:flex-start;">
            <div>
                <p style="font-size:12px; color:#6B7280; font-weight:600; margin:0 0 6px; text-transform:uppercase; letter-spacing:.05em;">Audit Logs</p>
                <p style="font-size:26px; font-weight:700; color:#111827; margin:0 0 8px; line-height:1;">{{ number_format($totalAuditLogs ?? 0) }}</p>
                <span class="badge badge-down">System activity</span>
            </div>

            <div class="icon-wrap" style="background:#FFF1F2; color:#E11D48;">
                <i class="fas fa-history"></i>
            </div>
        </div>

        <div class="progress-bar mt-3">
            <div class="progress-bar-fill" style="width:55%; background:#E11D48;"></div>
        </div>
    </div>

</div>

<div class="stat-grid mb-6" style="display:grid; grid-template-columns:repeat(4,1fr); gap:16px;">

    <div class="stat-card">
        <div style="display:flex; justify-content:space-between; align-items:flex-start;">
            <div>
                <p style="font-size:12px; color:#6B7280; font-weight:600; margin:0 0 6px; text-transform:uppercase;">Industries</p>
                <p style="font-size:26px; font-weight:700; color:#111827; margin:0;">{{ number_format($totalIndustries ?? 0) }}</p>
                <span class="badge badge-up">{{ number_format($activeIndustries ?? 0) }} active</span>
            </div>

            <div class="icon-wrap" style="background:#E0F2FE; color:#0284C7;">
                <i class="fas fa-industry"></i>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div style="display:flex; justify-content:space-between; align-items:flex-start;">
            <div>
                <p style="font-size:12px; color:#6B7280; font-weight:600; margin:0 0 6px; text-transform:uppercase;">Roles</p>
                <p style="font-size:26px; font-weight:700; color:#111827; margin:0;">{{ number_format($totalRoles ?? 0) }}</p>
                <span class="badge" style="background:#F3F4F6; color:#374151;">{{ number_format($totalPermissions ?? 0) }} permissions</span>
            </div>

            <div class="icon-wrap" style="background:#EEF2FF; color:#4F46E5;">
                <i class="fas fa-shield-alt"></i>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div style="display:flex; justify-content:space-between; align-items:flex-start;">
            <div>
                <p style="font-size:12px; color:#6B7280; font-weight:600; margin:0 0 6px; text-transform:uppercase;">Contact FAQs</p>
                <p style="font-size:26px; font-weight:700; color:#111827; margin:0;">{{ number_format($totalFaqs ?? 0) }}</p>
                <span class="badge" style="background:#DCFCE7; color:#15803D;">FAQ content</span>
            </div>

            <div class="icon-wrap" style="background:#DCFCE7; color:#15803D;">
                <i class="fas fa-question-circle"></i>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div style="display:flex; justify-content:space-between; align-items:flex-start;">
            <div>
                <p style="font-size:12px; color:#6B7280; font-weight:600; margin:0 0 6px; text-transform:uppercase;">About CMS</p>
                <p style="font-size:26px; font-weight:700; color:#111827; margin:0;">
                    {{ number_format(($aboutFeatureCount ?? 0) + ($aboutTimelineCount ?? 0)) }}
                </p>
                <span class="badge" style="background:#FCE7F3; color:#BE185D;">Features + timeline</span>
            </div>

            <div class="icon-wrap" style="background:#FCE7F3; color:#BE185D;">
                <i class="fas fa-info-circle"></i>
            </div>
        </div>
    </div>

</div>

<div class="chart-grid mb-6" style="display:grid; grid-template-columns:2fr 1fr; gap:16px;">

    <div class="chart-card">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
            <div>
                <p style="font-size:15px; font-weight:700; color:#111827; margin:0;">User Registrations</p>
                <p style="font-size:12px; color:#9CA3AF; margin:3px 0 0;">Last 7 days activity</p>
            </div>

            <div style="display:flex; gap:6px;">
                <button style="padding:5px 12px; border-radius:8px; border:1.5px solid var(--accent); background:var(--accent-light); color:var(--accent); font-size:12px; font-weight:600; cursor:pointer;">
                    Week
                </button>
            </div>
        </div>

        <canvas id="lineChart" height="90"></canvas>
    </div>

    <div class="chart-card">
        <div style="margin-bottom:16px;">
            <p style="font-size:15px; font-weight:700; color:#111827; margin:0;">User Roles</p>
            <p style="font-size:12px; color:#9CA3AF; margin:3px 0 0;">Distribution by role</p>
        </div>

        <canvas id="doughnutChart" height="160"></canvas>

        <div style="margin-top:12px; display:grid; grid-template-columns:1fr 1fr; gap:6px;" id="doughnut-legend"></div>
    </div>

</div>

<div class="dash-grid" style="display:grid; grid-template-columns:1.6fr 1fr; gap:16px; margin-bottom:24px;">

    <div class="chart-card">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
            <p style="font-size:15px; font-weight:700; color:#111827; margin:0;">Recent Users</p>

            @can('user_access')
                <a href="{{ route('admin.users.index') }}" style="font-size:12px; color:var(--accent); font-weight:600; text-decoration:none;">
                    View All →
                </a>
            @endcan
        </div>

        <table class="dash-table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Joined</th>
                </tr>
            </thead>

            <tbody>
                @forelse($recentUsers ?? [] as $user)
                    <tr>
                        <td>
                            <div style="display:flex; align-items:center; gap:10px;">
                                <div class="avatar">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>

                                <div>
                                    <p style="margin:0; font-weight:600; font-size:13px;">{{ $user->name }}</p>
                                    <p style="margin:0; font-size:11px; color:#9CA3AF;">{{ $user->email }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @forelse($user->roles as $role)
                                <span class="pill pill-blue">{{ $role->title }}</span>
                            @empty
                                <span class="pill" style="background:#F3F4F6; color:#374151;">No Role</span>
                            @endforelse
                        </td>

                        <td>
                            @if($user->deleted_at)
                                <span class="pill pill-red">Deleted</span>
                            @else
                                <span class="pill pill-green">Active</span>
                            @endif
                        </td>

                        <td style="color:#9CA3AF; font-size:12px;">
                            {{ $user->created_at ? $user->created_at->diffForHumans() : '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align:center; color:#9CA3AF;">No users found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="chart-card">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
            <p style="font-size:15px; font-weight:700; color:#111827; margin:0;">Recent Activity</p>

            @can('audit_log_access')
                <a href="{{ route('admin.audit-logs.index') }}" style="font-size:12px; color:var(--accent); font-weight:600; text-decoration:none;">
                    Audit Log →
                </a>
            @endcan
        </div>

        <div style="display:flex; flex-direction:column; gap:0;">
            @forelse($recentAuditLogs ?? [] as $i => $log)
                <div style="display:flex; gap:12px; align-items:flex-start; padding:10px 0; {{ $i < count($recentAuditLogs)-1 ? 'border-bottom:1px solid #F3F4F6;' : '' }}">
                    <div style="width:34px; height:34px; border-radius:10px; background:#EEF2FF; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i class="fas fa-history" style="color:var(--accent); font-size:13px;"></i>
                    </div>

                    <div style="flex:1; min-width:0;">
                        <p style="font-size:13px; color:#374151; margin:0; line-height:1.4;">
                            {{ $log->description ?? 'System activity recorded' }}
                        </p>

                        <p style="font-size:11px; color:#9CA3AF; margin:3px 0 0;">
                            {{ $log->created_at ? $log->created_at->diffForHumans() : '-' }}
                        </p>
                    </div>
                </div>
            @empty
                <p style="font-size:13px; color:#9CA3AF; margin:0;">No recent activity found.</p>
            @endforelse
        </div>
    </div>

</div>

<div class="mini-grid" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:24px;">

    <div class="chart-card">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
            <p style="font-size:15px; font-weight:700; color:#111827; margin:0;">Recent Inquiries</p>

            @can('contact_inquiry_access')
                <a href="{{ route('admin.contact-inquiries.index') }}" style="font-size:12px; color:var(--accent); font-weight:600; text-decoration:none;">
                    View All →
                </a>
            @endcan
        </div>

        <table class="dash-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
                @forelse($recentInquiries ?? [] as $inquiry)
                    <tr>
                        <td>
                            <p style="margin:0; font-weight:600; font-size:13px;">{{ $inquiry->full_name }}</p>
                            <p style="margin:0; font-size:11px; color:#9CA3AF;">{{ $inquiry->mobile_number }}</p>
                        </td>

                        <td>{{ $inquiry->user_type }}</td>

                        <td>
                            @if($inquiry->status == 'new')
                                <span class="pill pill-yellow">New</span>
                            @elseif($inquiry->status == 'contacted')
                                <span class="pill pill-green">Contacted</span>
                            @else
                                <span class="pill pill-blue">{{ ucfirst($inquiry->status) }}</span>
                            @endif
                        </td>

                        <td style="color:#9CA3AF; font-size:12px;">
                            {{ $inquiry->created_at ? $inquiry->created_at->diffForHumans() : '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align:center; color:#9CA3AF;">No inquiries found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="chart-card">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
            <p style="font-size:15px; font-weight:700; color:#111827; margin:0;">Recent Jobs</p>

            @can('job_access')
                <a href="{{ route('admin.jobs.index') }}" style="font-size:12px; color:var(--accent); font-weight:600; text-decoration:none;">
                    View All →
                </a>
            @endcan
        </div>

        <table class="dash-table">
            <thead>
                <tr>
                    <th>Job</th>
                    <th>Location</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($recentJobs ?? [] as $job)
                    <tr>
                        <td>
                            <p style="margin:0; font-weight:600; font-size:13px;">{{ $job->title }}</p>
                            <p style="margin:0; font-size:11px; color:#9CA3AF;">{{ $job->industry }}</p>
                        </td>

                        <td>{{ $job->location }}</td>

                        <td>
                            @if($job->status)
                                <span class="pill pill-green">Active</span>
                            @else
                                <span class="pill pill-red">Inactive</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align:center; color:#9CA3AF;">No jobs found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<div class="chart-card mb-2">
    <p style="font-size:15px; font-weight:700; color:#111827; margin:0 0 14px;">Quick Actions</p>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(150px,1fr)); gap:10px;">

        @can('user_create')
            <a href="{{ route('admin.users.create') }}" style="display:flex; align-items:center; gap:10px; padding:12px 14px; border-radius:10px; background:var(--accent-light); color:var(--accent); text-decoration:none; font-size:13px; font-weight:600;">
                <i class="fas fa-user-plus"></i> Add User
            </a>
        @endcan

        @can('role_create')
            <a href="{{ route('admin.roles.create') }}" style="display:flex; align-items:center; gap:10px; padding:12px 14px; border-radius:10px; background:#F0FDF4; color:#16A34A; text-decoration:none; font-size:13px; font-weight:600;">
                <i class="fas fa-plus-circle"></i> New Role
            </a>
        @endcan

        @can('permission_create')
            <a href="{{ route('admin.permissions.create') }}" style="display:flex; align-items:center; gap:10px; padding:12px 14px; border-radius:10px; background:#FFFBEB; color:#D97706; text-decoration:none; font-size:13px; font-weight:600;">
                <i class="fas fa-lock"></i> Add Permission
            </a>
        @endcan

        @can('audit_log_access')
            <a href="{{ route('admin.audit-logs.index') }}" style="display:flex; align-items:center; gap:10px; padding:12px 14px; border-radius:10px; background:#FFF1F2; color:#E11D48; text-decoration:none; font-size:13px; font-weight:600;">
                <i class="fas fa-history"></i> View Logs
            </a>
        @endcan

        @can('website_setting_access')
            <a href="{{ route('admin.website-settings.edit') }}" style="display:flex; align-items:center; gap:10px; padding:12px 14px; border-radius:10px; background:#E0F2FE; color:#0284C7; text-decoration:none; font-size:13px; font-weight:600;">
                <i class="fas fa-cog"></i> Website Settings
            </a>
        @endcan

        @can('job_create')
            <a href="{{ route('admin.jobs.create') }}" style="display:flex; align-items:center; gap:10px; padding:12px 14px; border-radius:10px; background:#ECFDF5; color:#059669; text-decoration:none; font-size:13px; font-weight:600;">
                <i class="fas fa-briefcase"></i> Add Job
            </a>
        @endcan

        @can('contact_inquiry_access')
            <a href="{{ route('admin.contact-inquiries.index') }}" style="display:flex; align-items:center; gap:10px; padding:12px 14px; border-radius:10px; background:#FEF3C7; color:#D97706; text-decoration:none; font-size:13px; font-weight:600;">
                <i class="fas fa-envelope-open-text"></i> Inquiries
            </a>
        @endcan

        @can('contact_faq_create')
            <a href="{{ route('admin.contact-faqs.create') }}" style="display:flex; align-items:center; gap:10px; padding:12px 14px; border-radius:10px; background:#FCE7F3; color:#BE185D; text-decoration:none; font-size:13px; font-weight:600;">
                <i class="fas fa-question-circle"></i> Add FAQ
            </a>
        @endcan

        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <a href="{{ route('profile.password.edit') }}" style="display:flex; align-items:center; gap:10px; padding:12px 14px; border-radius:10px; background:#F3F4F6; color:#374151; text-decoration:none; font-size:13px; font-weight:600;">
                    <i class="fas fa-key"></i> Change Password
                </a>
            @endcan
        @endif

    </div>
</div>

@endsection

@section('scripts')
@parent

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

@php
    $chartLabels = !empty($last7DaysLabels) ? $last7DaysLabels : ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    $chartUsers  = !empty($last7DaysUsers) ? $last7DaysUsers : [0, 0, 0, 0, 0, 0, 0];

    $safeRoleLabels = !empty($roleLabels) ? $roleLabels : ['No Roles'];
    $safeRoleData   = !empty($roleData) ? $roleData : [1];
@endphp

<script>
const accentColor = getComputedStyle(document.documentElement).getPropertyValue('--accent').trim() || '#4F46E5';

const lineEl = document.getElementById('lineChart');
let lineChart = null;

if (lineEl) {
    const lineCtx = lineEl.getContext('2d');

    lineChart = new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Registrations',
                data: @json($chartUsers),
                borderColor: accentColor,
                backgroundColor: accentColor + '1A',
                borderWidth: 2.5,
                fill: true,
                tension: 0.45,
                pointBackgroundColor: accentColor,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: {
                        font: { size: 12 },
                        color: '#9CA3AF'
                    }
                },
                y: {
                    grid: { color: '#F3F4F6' },
                    ticks: {
                        font: { size: 12 },
                        color: '#9CA3AF' 
                    }
                }
            }
        }
    });
}

const roleColors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6','#F97316'];

const roleLabels = @json($safeRoleLabels);
const roleData   = @json($safeRoleData);

const doughnutEl = document.getElementById('doughnutChart');

if (doughnutEl) {
    const dCtx = doughnutEl.getContext('2d');

    new Chart(dCtx, {
        type: 'doughnut',
        data: {
            labels: roleLabels,
            datasets: [{
                data: roleData,
                backgroundColor: roleColors,
                borderWidth: 0,
                hoverOffset: 6
            }]
        },
        options: {
            responsive: true,
            cutout: '68%',
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(ctx) {
                            return ' ' + ctx.label + ': ' + ctx.parsed;
                        }
                    }
                }
            }
        }
    });
}

const legendEl = document.getElementById('doughnut-legend');

if (legendEl) {
    roleLabels.forEach(function(label, i) {
        const color = roleColors[i % roleColors.length];
        const value = roleData[i] ?? 0;

        legendEl.innerHTML += `
            <div style="display:flex;align-items:center;gap:6px;">
                <span style="width:10px;height:10px;border-radius:3px;background:${color};display:inline-block;"></span>
                <span style="font-size:12px;color:#6B7280;">${label}</span>
                <span style="font-size:12px;font-weight:700;color:#111827;margin-left:auto;">${value}</span>
            </div>
        `;
    });
}

function setCSSVar(name, val) {
    document.documentElement.style.setProperty(name, val);
}

function setAccent(el) {
    document.querySelectorAll('.color-swatch').forEach(function(s) {
        s.classList.remove('active');
    });

    el.classList.add('active');

    const a = el.dataset.accent;
    const l = el.dataset.light;
    const d = el.dataset.dark;

    setCSSVar('--accent', a);
    setCSSVar('--accent-light', l);
    setCSSVar('--accent-dark', d);

    const customColor = document.getElementById('custom-color');
    const hexDisplay = document.getElementById('hex-display');

    if (customColor) {
        customColor.value = a;
    }

    if (hexDisplay) {
        hexDisplay.textContent = a.toUpperCase();
    }

    updateChartColors(a);
    saveTheme();
}

function applyCustomColor(hex) {
    document.querySelectorAll('.color-swatch').forEach(function(s) {
        s.classList.remove('active');
    });

    const hexDisplay = document.getElementById('hex-display');

    if (hexDisplay) {
        hexDisplay.textContent = hex.toUpperCase();
    }

    const light = hex + '1A';
    const dark = hex;

    setCSSVar('--accent', hex);
    setCSSVar('--accent-light', light);
    setCSSVar('--accent-dark', dark);

    updateChartColors(hex);
    saveTheme();
}

function updateChartColors(color) {
    if (lineChart) {
        lineChart.data.datasets[0].borderColor = color;
        lineChart.data.datasets[0].backgroundColor = color + '1A';
        lineChart.data.datasets[0].pointBackgroundColor = color;
        lineChart.update();
    }
}

const bgMap = {
    'bg-gray-100': '#F3F4F6',
    'bg-white': '#FFFFFF',
    'bg-slate-800': '#1E293B',
    'bg-blue-50': '#EFF6FF'
};

function setBg(cls) {
    const mainEl = document.querySelector('body > .flex.min-h-screen > .flex-1');

    if (mainEl) {
        const color = bgMap[cls] || '#F3F4F6';
        mainEl.style.background = color;
    }

    document.querySelectorAll('.theme-bg-btn').forEach(function(b) {
        b.style.borderColor = '#E5E7EB';
    });

    localStorage.setItem('dash_bg', cls);
}

function setSize(size) {
    const s = {
        compact: '13px',
        default: '14px',
        spacious: '15px'
    };

    document.documentElement.style.fontSize = s[size] || '14px';
}

function toggleTheme() {
    const panel = document.getElementById('theme-panel');

    if (panel) {
        panel.classList.toggle('open');
    }
}

function resetTheme() {
    setCSSVar('--accent', '#4F46E5');
    setCSSVar('--accent-light', '#EEF2FF');
    setCSSVar('--accent-dark', '#3730A3');

    updateChartColors('#4F46E5');

    const customColor = document.getElementById('custom-color');
    const hexDisplay = document.getElementById('hex-display');

    if (customColor) {
        customColor.value = '#4F46E5';
    }

    if (hexDisplay) {
        hexDisplay.textContent = '#4F46E5';
    }

    document.querySelectorAll('.color-swatch').forEach(function(s, i) {
        if (i === 0) {
            s.classList.add('active');
        } else {
            s.classList.remove('active');
        }
    });

    localStorage.removeItem('dash_theme');
    localStorage.removeItem('dash_bg');
}

function saveTheme() {
    const t = {
        accent: getComputedStyle(document.documentElement).getPropertyValue('--accent').trim()
    };

    localStorage.setItem('dash_theme', JSON.stringify(t));
}

(function() {
    const saved = localStorage.getItem('dash_theme');

    if (saved) {
        try {
            const t = JSON.parse(saved);

            if (t.accent) {
                applyCustomColor(t.accent.trim());
            }
        } catch(e) {}
    }
})();

document.addEventListener('click', function(e) {
    const panel = document.getElementById('theme-panel');
    const btn = document.getElementById('theme-toggle-btn');

    if (panel && btn && panel.classList.contains('open') && !panel.contains(e.target) && e.target !== btn) {
        panel.classList.remove('open');
    }
});
</script>

@endsection