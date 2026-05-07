@extends('frontend.master')

@section('content')

<style>
    :root{
        --brand:#1e3a8a;
        --brand2:#0ea5e9;
        --ink:#0f172a;
        --muted:#64748b;
        --soft:#f5f7ff;
        --soft2:#f8fafc;
    }

    .auth-premium{
        min-height: 100vh;
        position: relative;
        display: grid;
        place-items: center;
        padding: 40px 16px;
        overflow: hidden;
        background:
            radial-gradient(1200px 700px at 12% 10%, rgba(30,58,138,.20), transparent 60%),
            radial-gradient(900px 600px at 88% 25%, rgba(14,165,233,.20), transparent 55%),
            linear-gradient(180deg,#ffffff,#f8fafc);
    }

    .auth-bg-grid{
        position:absolute;
        inset:0;
        background-image:
            linear-gradient(to right, rgba(15,23,42,.06) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(15,23,42,.06) 1px, transparent 1px);
        background-size: 60px 60px;
        opacity: .25;
        pointer-events:none;
    }

    .auth-orb{
        position:absolute;
        width: 520px;
        height: 520px;
        border-radius: 50%;
        filter: blur(42px);
        opacity: .35;
        pointer-events:none;
    }

    .auth-orb-1{
        left: -180px;
        top: -160px;
        background: rgba(30,58,138,.65);
    }

    .auth-orb-2{
        right: -220px;
        bottom: -160px;
        background: rgba(14,165,233,.65);
    }

    .auth-card{
        width: 100%;
        max-width: 460px;
        position: relative;
        z-index: 2;
        border-radius: 26px;
        background: rgba(255,255,255,.78);
        border: 1px solid rgba(15,23,42,.10);
        box-shadow:
            0 22px 70px rgba(15,23,42,.12),
            0 1px 0 rgba(255,255,255,.7) inset;
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        overflow: hidden;
    }

    .auth-card::before{
        content:"";
        position:absolute;
        inset:-40% -20%;
        background: linear-gradient(110deg, transparent 0%, rgba(255,255,255,.55) 35%, transparent 70%);
        transform: translateX(-55%);
        animation: authShimmer 2.6s ease-in-out infinite;
        pointer-events:none;
    }

    @keyframes authShimmer{
        0%{ transform: translateX(-55%); opacity:0; }
        25%{ opacity:.22; }
        100%{ transform: translateX(55%); opacity:0; }
    }

    .auth-card-inner{
        position: relative;
        z-index: 3;
        padding: 34px 34px 30px;
    }

    .auth-logo-wrap{
        display: flex;
        justify-content: center;
        margin-bottom: 14px;
    }

    .auth-logo-box{
        width: 86px;
        height: 86px;
        border-radius: 24px;
        display: grid;
        place-items: center;
        background: rgba(255,255,255,.72);
        border: 1px solid rgba(2,6,23,.08);
        box-shadow: 0 14px 30px rgba(2,6,23,.08);
    }

    .auth-logo{
        max-width: 68px;
        max-height: 68px;
        object-fit: contain;
    }

    .auth-badge{
        display:inline-flex;
        align-items:center;
        gap:9px;
        padding: 9px 13px;
        border-radius: 999px;
        border: 1px solid rgba(30,58,138,.18);
        background: rgba(255,255,255,.55);
        color: rgba(15,23,42,.86);
        font-weight: 800;
        font-size: 12px;
        letter-spacing: .06em;
        text-transform: uppercase;
        box-shadow: 0 10px 26px rgba(2,6,23,.06);
    }

    .auth-badge i{
        color: var(--brand);
    }

    .auth-title{
        margin: 18px 0 6px;
        font-size: 30px;
        font-weight: 900;
        line-height: 1.1;
        letter-spacing: -.03em;
        color: var(--ink);
        text-align: center;
    }

    .auth-title span{
        display:block;
        background: linear-gradient(135deg, rgba(30,58,138,1), rgba(14,165,233,1));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .auth-subtitle{
        text-align: center;
        color: var(--muted);
        font-size: 14px;
        margin-bottom: 24px;
    }

    .auth-alert{
        padding: 12px 14px;
        border-radius: 16px;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 16px;
        border: 1px solid rgba(14,165,233,.22);
        background: rgba(14,165,233,.10);
        color: #075985;
    }

    .auth-field{
        margin-bottom: 16px;
    }

    .auth-label{
        display:block;
        font-size: 13px;
        font-weight: 800;
        color: rgba(15,23,42,.82);
        margin-bottom: 8px;
    }

    .auth-input-icon{
        position: relative;
    }

    .auth-input-icon i{
        position:absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(100,116,139,1);
        font-size: 15px;
    }

    .auth-input{
        width: 100%;
        height: 50px;
        border-radius: 16px;
        border: 1px solid rgba(2,6,23,.10);
        background: rgba(255,255,255,.74);
        padding: 0 14px 0 42px;
        color: var(--ink);
        font-size: 14px;
        font-weight: 600;
        outline: none;
        transition: box-shadow .2s ease, border-color .2s ease, background .2s ease;
    }

    .auth-input:focus{
        background: rgba(255,255,255,.92);
        box-shadow: 0 0 0 .25rem rgba(14,165,233,.18);
        border-color: rgba(14,165,233,.40);
    }

    .auth-input.is-invalid{
        border-color: rgba(220,38,38,.65);
        box-shadow: 0 0 0 .20rem rgba(220,38,38,.10);
    }

    .auth-error{
        margin-top: 7px;
        color: #dc2626;
        font-size: 12px;
        font-weight: 700;
    }

    .auth-row{
        display:flex;
        justify-content: space-between;
        align-items:center;
        gap: 12px;
        margin: 4px 0 20px;
    }

    .auth-check{
        display:flex;
        align-items:center;
        gap:8px;
        color: rgba(15,23,42,.72);
        font-size: 13px;
        font-weight: 700;
    }

    .auth-check input{
        width: 16px;
        height: 16px;
        accent-color: var(--brand2);
    }

    .auth-link{
        color: var(--brand);
        text-decoration: none;
        font-size: 13px;
        font-weight: 800;
    }

    .auth-link:hover{
        color: var(--brand2);
        text-decoration: underline;
    }

    .auth-submit{
        width: 100%;
        border: 0;
        height: 52px;
        border-radius: 999px;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:9px;
        color:#fff;
        font-weight: 900;
        font-size: 15px;
        background: linear-gradient(135deg, rgba(30,58,138,1) 0%, rgba(14,165,233,1) 100%);
        box-shadow: 0 14px 28px rgba(14,165,233,.22);
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .auth-submit:hover{
        transform: translateY(-2px);
        box-shadow: 0 18px 34px rgba(14,165,233,.28);
    }

    .auth-footer{
        margin-top: 20px;
        text-align: center;
        font-size: 14px;
        color: var(--muted);
        font-weight: 600;
    }

    .auth-footer a{
        color: var(--brand);
        font-weight: 900;
        text-decoration: none;
    }

    .auth-footer a:hover{
        color: var(--brand2);
        text-decoration: underline;
    }

    .auth-secure{
        margin-top: 18px;
        display:flex;
        align-items:center;
        justify-content:center;
        gap:8px;
        padding: 11px 12px;
        border-radius: 18px;
        background: rgba(255,255,255,.65);
        border: 1px solid rgba(2,6,23,.08);
        color: rgba(15,23,42,.70);
        font-size: 12px;
        font-weight: 800;
    }

    .auth-secure i{
        color: #22c55e;
    }

    @media(max-width: 575.98px){
        .auth-card-inner{
            padding: 28px 22px 24px;
        }

        .auth-title{
            font-size: 26px;
        }

        .auth-row{
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="auth-premium">
    <div class="auth-bg-grid"></div>
    <div class="auth-orb auth-orb-1"></div>
    <div class="auth-orb auth-orb-2"></div>

    <div class="auth-card">

        <div class="auth-card-inner">

            <div class="auth-logo-wrap">
                <div class="auth-logo-box">
                    <img src="{{ asset('assets/img/logo.png') }}"
                         alt="{{ trans('panel.site_title') }}"
                         class="auth-logo">
                </div>
            </div>

            <div class="text-center">
                <div class="auth-badge">
                    <i class="bi bi-shield-check"></i>
                    Admin Access
                </div>
            </div>

            <h1 class="auth-title">
                {{ trans('global.login') }}
                <span>{{ trans('panel.site_title') }}</span>
            </h1>

            <p class="auth-subtitle">
                Sign in to manage website content, jobs, inquiries and settings.
            </p>

            @if(session('message'))
                <div class="auth-alert">
                    <i class="bi bi-info-circle me-1"></i>
                    {{ session('message') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="auth-field">
                    <label class="auth-label">
                        {{ trans('global.login_email') }}
                    </label>

                    <div class="auth-input-icon">
                        <i class="bi bi-envelope"></i>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               placeholder="Enter your email"
                               class="auth-input {{ $errors->has('email') ? 'is-invalid' : '' }}">
                    </div>

                    @if($errors->has('email'))
                        <div class="auth-error">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="auth-field">
                    <label class="auth-label">
                        {{ trans('global.login_password') }}
                    </label>

                    <div class="auth-input-icon">
                        <i class="bi bi-lock"></i>
                        <input type="password"
                               name="password"
                               required
                               placeholder="Enter your password"
                               class="auth-input {{ $errors->has('password') ? 'is-invalid' : '' }}">
                    </div>

                    @if($errors->has('password'))
                        <div class="auth-error">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="auth-row">
                    <label class="auth-check">
                        <input type="checkbox" name="remember">
                        {{ trans('global.remember_me') }}
                    </label>

                    @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="auth-link">
                            {{ trans('global.forgot_password') }}
                        </a>
                    @endif
                </div>

                <button type="submit" class="auth-submit">
                    <i class="bi bi-box-arrow-in-right"></i>
                    {{ trans('global.login') }}
                </button>

                <div class="auth-footer">
                    Don’t have an account?
                    <a href="{{ route('register') }}">
                        {{ trans('global.register') }}
                    </a>
                </div>

                <div class="auth-secure">
                    <i class="bi bi-lock"></i>
                    Secure admin authentication
                </div>

            </form>

        </div>
    </div>
</div>

@endsection