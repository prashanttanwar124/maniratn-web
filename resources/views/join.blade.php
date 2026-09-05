<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Join Maniratn VIP Club — Walk-in Registration & Digital Vault</title>
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="Register your VIP membership with Maniratn Jewellers for instant Smart Digital Gold Vault, certificates, and anniversary privileges.">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="icon" type="image/svg+xml" href="/favicon_v2.svg">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon_v2-96x96.png">
    <link rel="icon" type="image/png" sizes="48x48" href="/favicon_v2-48x48.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/favicon_v2-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_v2-32x32.png">
    <link rel="shortcut icon" href="/favicon_v2.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon_v2.png">
    <meta name="theme-color" content="#070b0a">

    <!-- Premium Google Fonts: Outfit & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #070908;
            --surface: #0e1210;
            --surface-card: #141916;
            --surface-elevated: #1b221e;
            --border-subtle: rgba(255, 255, 255, 0.08);
            --border-gold: rgba(212, 175, 55, 0.35);
            --border-gold-bright: rgba(243, 229, 171, 0.6);
            --gold-primary: #d4af37;
            --gold-light: #f3e5ab;
            --gold-gradient: linear-gradient(135deg, #c4922a 0%, #fae19c 45%, #e2b755 70%, #aa771c 100%);
            --gold-text-gradient: linear-gradient(135deg, #f9e8b3 0%, #d4af37 50%, #f3e5ab 100%);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            --accent-green: #10b981;
            --accent-red: #f87171;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: var(--bg);
            color: var(--text-primary);
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            padding-bottom: 3.5rem;
            background-image: 
                radial-gradient(circle at 50% 0%, rgba(212, 175, 55, 0.12) 0%, transparent 60%),
                radial-gradient(circle at 100% 100%, rgba(16, 185, 129, 0.04) 0%, transparent 50%);
            background-attachment: fixed;
        }

        /* Top Luxury Header */
        .brand-header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(7, 9, 8, 0.92);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-bottom: 1px solid var(--border-subtle);
            padding: 0.85rem 1.25rem;
        }

        .header-inner {
            max-width: 520px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand-logo-wrap {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
        }

        .brand-logo-text {
            font-family: 'Outfit', sans-serif;
            font-size: 1.15rem;
            font-weight: 800;
            letter-spacing: 0.05em;
            color: #ffffff;
            text-transform: uppercase;
        }

        .brand-logo-gold {
            background: var(--gold-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .vip-header-badge {
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--gold-light);
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.18) 0%, rgba(212, 175, 55, 0.06) 100%);
            border: 1px solid var(--border-gold);
            padding: 0.3rem 0.75rem;
            border-radius: 9999px;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            box-shadow: 0 0 12px rgba(212, 175, 55, 0.15);
        }

        .main-container {
            max-width: 520px;
            margin: 0 auto;
            padding: 1.25rem 1rem;
        }

        /* Hero Onboarding Card */
        .onboarding-hero {
            background: var(--surface);
            border: 1px solid var(--border-gold);
            border-radius: 1.25rem;
            padding: 1.65rem 1.35rem;
            margin-bottom: 1.25rem;
            position: relative;
            box-shadow: 
                0 20px 40px -15px rgba(0, 0, 0, 0.8),
                0 0 40px -10px rgba(212, 175, 55, 0.16);
            overflow: hidden;
        }

        /* Ambient Glow & Inner Border */
        .onboarding-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gold-gradient);
        }

        .hero-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.85rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            padding-bottom: 0.75rem;
        }

        .hero-label {
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: var(--gold-primary);
            display: flex;
            align-items: center;
            gap: 0.35rem;
        }

        .verified-standee {
            font-size: 0.68rem;
            color: var(--accent-green);
            display: flex;
            align-items: center;
            gap: 0.35rem;
            font-weight: 700;
            background: rgba(16, 185, 129, 0.08);
            border: 1px solid rgba(16, 185, 129, 0.25);
            padding: 0.2rem 0.55rem;
            border-radius: 9999px;
            white-space: nowrap;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--accent-green);
            box-shadow: 0 0 8px var(--accent-green);
        }

        .hero-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.85rem;
            font-weight: 900;
            color: #ffffff;
            line-height: 1.15;
            margin-bottom: 0.5rem;
            letter-spacing: -0.01em;
        }

        .hero-title-gold {
            background: var(--gold-text-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-desc {
            font-size: 0.84rem;
            color: #cbd5e1;
            line-height: 1.55;
            margin-bottom: 0.5rem;
        }

        /* Value Pills Row */
        .value-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 0.4rem;
            margin: 0.85rem 0 1.25rem;
        }

        .value-pill {
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--gold-light);
            background: rgba(212, 175, 55, 0.08);
            border: 1px solid rgba(212, 175, 55, 0.2);
            padding: 0.25rem 0.6rem;
            border-radius: 0.45rem;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        /* Form Controls */
        .form-grid {
            display: flex;
            flex-direction: column;
            gap: 1.15rem;
            margin-top: 1rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .form-label {
            font-size: 0.74rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-label .label-left {
            display: flex;
            align-items: center;
            gap: 0.35rem;
        }

        .form-label .req {
            color: var(--gold-primary);
            font-weight: 900;
            font-size: 0.85rem;
        }

        .form-label .optional-tag {
            font-size: 0.65rem;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: none;
            letter-spacing: normal;
            background: rgba(255, 255, 255, 0.04);
            padding: 0.15rem 0.45rem;
            border-radius: 0.3rem;
            border: 1px solid rgba(255, 255, 255, 0.06);
        }

        .input-wrap {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            font-size: 0.95rem;
            color: var(--gold-primary);
            pointer-events: none;
            z-index: 2;
            display: flex;
            align-items: center;
        }

        .input-prefix {
            position: absolute;
            left: 1rem;
            font-size: 0.95rem;
            font-weight: 800;
            color: var(--gold-primary);
            pointer-events: none;
            font-family: 'Outfit', sans-serif;
            z-index: 2;
        }

        .input-control {
            width: 100%;
            height: 50px;
            background: var(--surface-card);
            border: 1px solid rgba(212, 175, 55, 0.22);
            border-radius: 0.75rem;
            padding: 0 1rem;
            color: #ffffff;
            font-size: 16px; /* Prevents auto-zoom on iPhone */
            font-family: inherit;
            outline: none;
            transition: all 0.2s ease;
            color-scheme: dark; /* Dark mode native calendar popup */
        }

        .input-control::placeholder {
            color: #64748b;
            font-size: 0.88rem;
        }

        .input-control:focus {
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2), 0 0 15px rgba(212, 175, 55, 0.15);
            background: var(--surface-elevated);
        }

        .input-control.with-icon {
            padding-left: 2.85rem;
        }

        .input-control.with-prefix {
            padding-left: 3.25rem;
            font-family: 'Outfit', monospace;
            font-weight: 600;
            letter-spacing: 0.08em;
        }

        /* Native date input luxury dark styling */
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(0.8) sepia(100%) saturate(400%) hue-rotate(5deg);
            cursor: pointer;
            padding: 4px;
        }

        .form-hint {
            font-size: 0.73rem;
            color: var(--text-muted);
            line-height: 1.4;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .form-error {
            font-size: 0.75rem;
            color: var(--accent-red);
            margin-top: 0.2rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        /* Gold Submit Button with Refined Luxury Styling */
        .btn-gold {
            position: relative;
            width: 100%;
            height: 48px;
            background: var(--gold-gradient);
            color: #070908;
            border: none;
            border-radius: 0.75rem;
            font-family: 'Outfit', sans-serif;
            font-size: 0.88rem;
            font-weight: 700;
            letter-spacing: 0.02em;
            text-transform: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 0.65rem;
            box-shadow: 0 4px 18px rgba(212, 175, 55, 0.28);
            transition: transform 0.1s ease, filter 0.15s ease, box-shadow 0.15s ease;
            overflow: hidden;
        }

        .btn-gold::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                60deg,
                transparent 30%,
                rgba(255, 255, 255, 0.35) 50%,
                transparent 70%
            );
            transform: rotate(25deg);
            animation: sweep 4s infinite linear;
            pointer-events: none;
        }

        @keyframes sweep {
            0% { transform: translateX(-100%) rotate(25deg); }
            30%, 100% { transform: translateX(100%) rotate(25deg); }
        }

        .btn-gold:hover {
            filter: brightness(1.08);
            box-shadow: 0 6px 22px rgba(212, 175, 55, 0.38);
        }

        .btn-gold:active {
            transform: scale(0.985);
        }

        .btn-gold:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            filter: none;
        }


        .spinner {
            width: 18px;
            height: 18px;
            border: 2.5px solid #070908;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Success Card Preview */
        .success-box {
            display: none;
            text-align: center;
            padding: 0.5rem 0;
        }

        .vip-card-preview {
            background: linear-gradient(135deg, #14241e 0%, #0d1714 50%, #080f0c 100%);
            border: 2px solid var(--border-gold);
            border-radius: 1.25rem;
            padding: 1.75rem 1.4rem;
            text-align: left;
            margin: 1.25rem 0;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.8), 0 0 30px rgba(212, 175, 55, 0.2);
        }

        .vip-card-preview::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.25) 0%, transparent 70%);
            pointer-events: none;
        }

        .vip-card-badge {
            font-size: 0.68rem;
            font-weight: 900;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--gold-primary);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .vip-card-name {
            font-family: 'Outfit', sans-serif;
            font-size: 1.55rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0.6rem 0 0.2rem;
            letter-spacing: 0.02em;
        }

        .vip-card-phone {
            font-size: 0.85rem;
            color: #cbd5e1;
            font-family: 'Outfit', monospace;
            font-weight: 600;
        }

        .vip-card-bottom {
            margin-top: 1.65rem;
            padding-top: 0.95rem;
            border-top: 1px solid rgba(212, 175, 55, 0.25);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Perks Row */
        .perks-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.65rem;
            margin-top: 1.25rem;
        }

        .perk-card {
            background: var(--surface);
            border: 1px solid var(--border-subtle);
            border-radius: 0.75rem;
            padding: 0.95rem 0.5rem;
            text-align: center;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .perk-card:hover {
            border-color: var(--border-gold);
            transform: translateY(-2px);
        }

        .perk-icon {
            font-size: 1.45rem;
            margin-bottom: 0.3rem;
            display: block;
        }

        .perk-title {
            font-family: 'Outfit', sans-serif;
            font-size: 0.74rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 0.2rem;
        }

        .perk-desc {
            font-size: 0.66rem;
            color: var(--text-muted);
            line-height: 1.35;
        }

        .error-banner {
            display: none;
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.4);
            border-radius: 0.75rem;
            padding: 0.85rem 1rem;
            margin-bottom: 1rem;
            font-size: 0.82rem;
            color: #fca5a5;
            font-weight: 600;
        }

        .footer-note {
            text-align: center;
            font-size: 0.74rem;
            color: var(--text-muted);
            margin-top: 2rem;
            line-height: 1.6;
        }

        .footer-note strong {
            color: #e2e8f0;
        }
    </style>
</head>

<body>
    <!-- Top Header -->
    <header class="brand-header">
        <div class="header-inner">
            <a href="/" class="brand-logo-wrap">
                <span class="brand-logo-text">
                    MANIRATN <span class="brand-logo-gold">JEWELLERS</span>
                </span>
            </a>
            <div class="vip-header-badge">
                ✨ VIP CLUB
            </div>
        </div>
    </header>

    <main class="main-container">
        <!-- Error Banner -->
        <div id="errorBanner" class="error-banner"></div>

        <!-- FORM SECTION -->
        <section id="formSection" class="onboarding-hero">
            <div class="hero-top">
                <span class="hero-label">
                    <span>👑</span> VIP WALK-IN REGISTRATION
                </span>
                <span class="verified-standee">
                    <span class="status-dot"></span>
                    Verified Showroom Standee
                </span>
            </div>

            <h1 class="hero-title">
                Join <span class="hero-title-gold">Maniratn VIP Club</span>
            </h1>
            <p class="hero-desc">
                Register in 30 seconds for your personal <strong>Smart Digital Gold Vault</strong>, lifetime jewellery passbook, and festive rewards.
            </p>


            <!-- Value Props Badges -->
            <div class="value-pills">
                <span class="value-pill">🔐 Instant Digital Vault</span>
                <span class="value-pill">🎂 Birthday Gold Voucher</span>
                <span class="value-pill">💍 Anniversary Gifts</span>
            </div>

            <form id="onboardingForm" class="form-grid" onsubmit="handleOnboardingSubmit(event)">
                <input type="hidden" id="tokenInput" name="token" value="{{ $initialCode ?? '' }}">

                @if (empty($initialCode))
                <div class="form-group">
                    <label class="form-label" for="manualToken">
                        <span class="label-left">🔑 Counter Token <span class="req">*</span></span>
                    </label>
                    <input type="text" id="manualToken" class="input-control" placeholder="karatsetu_..." value="{{ $initialCode ?? '' }}" required>
                    <span class="form-hint">Scan the showroom counter standee QR code to auto-fill.</span>
                </div>
                @endif

                @if (empty($initialPin))
                <div class="form-group" id="pinGroup">
                    <label class="form-label" for="pinInput">
                        <span class="label-left">🔢 Counter PIN</span>
                        <span class="optional-tag">If shown on standee</span>
                    </label>
                    <div class="input-wrap">
                        <input type="text" id="pinInput" class="input-control" placeholder="4-digit PIN (e.g. 4123)" maxlength="10" value="">
                    </div>
                    <span class="form-hint">Only required if a Counter Code is printed on your showroom standee.</span>
                    <div id="pinError" class="form-error"></div>
                </div>
                @else
                <input type="hidden" id="pinInput" name="pin" value="{{ $initialPin }}">
                @endif


                <!-- Full Name -->
                <div class="form-group">
                    <label class="form-label" for="nameInput">
                        <span class="label-left">👤 Full Name <span class="req">*</span></span>
                    </label>
                    <div class="input-wrap">
                        <input type="text" id="nameInput" class="input-control" placeholder="e.g. Rajesh S. Sharma" required autocomplete="name">
                    </div>
                    <div id="nameError" class="form-error"></div>
                </div>

                <!-- Mobile Number -->
                <div class="form-group">
                    <label class="form-label" for="mobileInput">
                        <span class="label-left">📱 Mobile Number <span class="req">*</span></span>
                    </label>
                    <div class="input-wrap">
                        <span class="input-prefix">+91</span>
                        <input type="tel" id="mobileInput" class="input-control with-prefix" placeholder="98XXXXXXXX" maxlength="10" required autocomplete="tel" oninput="formatMobile(this)">
                    </div>
                    <span class="form-hint">For your Digital Vault passbook and WhatsApp invoice delivery.</span>
                    <div id="mobileError" class="form-error"></div>
                </div>

                <!-- Birthday (REQUIRED) -->
                <div class="form-group">
                    <label class="form-label" for="dobInput">
                        <span class="label-left">🎂 Date of Birth <span class="req">*</span></span>
                        <span class="optional-tag" style="color: var(--gold-light); border-color: rgba(212,175,55,0.3); background: rgba(212,175,55,0.1);">Required for Birthday Gift</span>
                    </label>
                    <div class="input-wrap">
                        <input type="date" id="dobInput" class="input-control" required>
                    </div>
                    <span class="form-hint">Receive an exclusive gold discount voucher on your birthday.</span>
                    <div id="dobError" class="form-error"></div>
                </div>

                <!-- Wedding Anniversary (Optional) -->
                <div class="form-group">
                    <label class="form-label" for="anniversaryInput">
                        <span class="label-left">💍 Wedding Anniversary</span>
                        <span class="optional-tag">Optional</span>
                    </label>
                    <div class="input-wrap">
                        <input type="date" id="anniversaryInput" class="input-control">
                    </div>
                    <span class="form-hint">Celebrate your special day with exclusive anniversary rewards.</span>
                </div>

                <!-- City / Town -->
                <div class="form-group">
                    <label class="form-label" for="cityInput">
                        <span class="label-left">📍 City / Location</span>
                        <span class="optional-tag">Optional</span>
                    </label>
                    <div class="input-wrap">
                        <input type="text" id="cityInput" class="input-control" placeholder="e.g. Virar West / Mumbai" value="Virar">
                    </div>
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label class="form-label" for="emailInput">
                        <span class="label-left">✉️ Email Address</span>
                        <span class="optional-tag">Optional</span>
                    </label>
                    <div class="input-wrap">
                        <input type="email" id="emailInput" class="input-control" placeholder="name@example.com" autocomplete="email">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="submitBtn" class="btn-gold">
                    <span id="btnSpinner" class="spinner" style="display: none;"></span>
                    <span id="btnText">✨ Activate VIP Pass & Digital Vault</span>
                </button>

            </form>
        </section>

        <!-- SUCCESS SECTION -->
        <section id="successSection" class="success-box">
            <div class="onboarding-hero">
                <div class="vip-header-badge" style="margin-bottom: 0.85rem;">
                    ✨ MEMBERSHIP ACTIVATED
                </div>

                <h1 class="hero-title">
                    Welcome to <span class="hero-title-gold">VIP Club!</span>
                </h1>
                <p class="hero-desc" id="successCustomerMessage">
                    Your exclusive membership and Smart Digital Gold Vault have been created.
                </p>

                <!-- VIP Card Display -->
                <div class="vip-card-preview">
                    <div class="vip-card-badge">
                        <span>MANIRATN JEWELLERS</span>
                        <span style="color: var(--gold-light);">💎 VIP GOLD MEMBER</span>
                    </div>
                    <div id="cardHolderName" class="vip-card-name">Customer Name</div>
                    <div id="cardHolderPhone" class="vip-card-phone">+91 98XXXXXXXX</div>


                    <div class="vip-card-bottom">
                        <div>
                            <span style="font-size: 0.65rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700;">Digital Vault Status</span>
                            <div style="font-size: 0.78rem; font-weight: 800; color: var(--accent-green); display: flex; align-items: center; gap: 0.35rem; margin-top: 0.15rem;">
                                <span class="status-dot"></span> Active & Verified
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <span style="font-size: 0.65rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700;">Showroom</span>
                            <div style="font-size: 0.78rem; font-weight: 700; color: var(--gold-light); margin-top: 0.15rem;">Virar West</div>
                        </div>
                    </div>
                </div>

                <a id="openVaultBtn" href="#" class="btn-gold" style="text-decoration: none;">
                    🔓 Open My Digital Gold Vault
                </a>
            </div>
        </section>

        <!-- Perks Strip -->
        <div class="perks-grid">
            <div class="perk-card">
                <span class="perk-icon">🔐</span>
                <div class="perk-title">Digital Vault</div>
                <div class="perk-desc">All purchases, HUID hallmarking, & bills on your phone.</div>
            </div>

            <div class="perk-card">
                <span class="perk-icon">📈</span>
                <div class="perk-title">Live Valuation</div>
                <div class="perk-desc">Live daily valuation of your gold jewellery portfolio.</div>
            </div>

            <div class="perk-card">
                <span class="perk-icon">🎁</span>
                <div class="perk-title">VIP Rewards</div>
                <div class="perk-desc">Birthday gold vouchers and festive surprises.</div>
            </div>
        </div>

        <!-- Footer / Powered by KaratSetu -->
        <footer class="footer-note">
            <p><strong>Maniratn Jewellers</strong> • Fine Gold & Diamond Jewellery</p>
            <p style="margin-top: 0.25rem;">Bolinj Rd, Gokul Twp, Virar West, Maharashtra 401303 • +91 98928 20518</p>
            <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid rgba(255, 255, 255, 0.08);">
                <p style="font-size: 0.72rem; color: #a1a1aa;">© {{ date('Y') }} Maniratn Jewellers · All Rights Reserved</p>
                <p style="margin-top: 0.35rem; font-size: 0.72rem; color: #71717a;">
                    Digital Vault & ERP Technology Powered by <a href="https://karatsetu.com/" target="_blank" rel="noopener" style="color: #d4af37; font-weight: 600; text-decoration: none;">KaratSetu</a>
                </p>
            </div>
        </footer>
    </main>

    <script>
        function formatMobile(input) {
            var val = input.value.replace(/\D/g, '');
            if (val.length > 10 && val.startsWith('91')) {
                val = val.slice(2);
            }
            if (val.length > 10) {
                val = val.slice(0, 10);
            }
            input.value = val;
        }

        async function handleOnboardingSubmit(event) {
            event.preventDefault();

            var errorBanner = document.getElementById('errorBanner');
            var nameError = document.getElementById('nameError');
            var mobileError = document.getElementById('mobileError');
            var dobError = document.getElementById('dobError');
            var pinError = document.getElementById('pinError');
            var submitBtn = document.getElementById('submitBtn');
            var btnSpinner = document.getElementById('btnSpinner');
            var btnText = document.getElementById('btnText');

            errorBanner.style.display = 'none';
            nameError.textContent = '';
            mobileError.textContent = '';
            if (dobError) dobError.textContent = '';
            if (pinError) pinError.textContent = '';

            var token = document.getElementById('tokenInput').value || (document.getElementById('manualToken') ? document.getElementById('manualToken').value : '');
            var pin = document.getElementById('pinInput') ? document.getElementById('pinInput').value.trim() : '';
            var name = document.getElementById('nameInput').value.trim();
            var mobile = document.getElementById('mobileInput').value.trim();
            var dob = document.getElementById('dobInput').value;
            var anniversary_date = document.getElementById('anniversaryInput').value;
            var city = document.getElementById('cityInput').value.trim();
            var email = document.getElementById('emailInput').value.trim();


            if (!token) {
                errorBanner.textContent = 'Missing counter registration token. Please scan the QR standee at the counter.';
                errorBanner.style.display = 'block';
                return;
            }

            if (!name || name.length < 2) {
                nameError.textContent = 'Please enter your full name.';
                return;
            }

            if (!mobile || mobile.length !== 10) {
                mobileError.textContent = 'Please enter a valid 10-digit mobile number.';
                return;
            }

            if (!dob) {
                if (dobError) dobError.textContent = 'Please select your Date of Birth for birthday rewards.';
                return;
            }

            submitBtn.disabled = true;
            btnSpinner.style.display = 'inline-block';
            btnText.textContent = 'ACTIVATING MEMBERSHIP...';

            try {
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                var response = await fetch('/join', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        token: token,
                        pin: pin,
                        name: name,
                        mobile: mobile,
                        dob: dob,
                        anniversary_date: anniversary_date,
                        city: city,
                        email: email
                    })
                });

                var data = await response.json();

                if (response.ok && data.success) {
                    document.getElementById('formSection').style.display = 'none';
                    document.getElementById('successSection').style.display = 'block';
                    document.getElementById('cardHolderName').textContent = data.customer.name || name;
                    document.getElementById('cardHolderPhone').textContent = '+91 ' + (data.customer.mobile || mobile);
                    document.getElementById('successCustomerMessage').textContent = 'Thank you, ' + (data.customer.name || name) + '. Your exclusive membership and Smart Digital Gold Vault have been created.';
                    
                    var vaultLink = data.vault_url || ('/vault/' + data.customer.vault_token);
                    document.getElementById('openVaultBtn').setAttribute('href', vaultLink);
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                } else if (response.status === 401) {
                    if (data.message && data.message.toLowerCase().includes('pin') && pinError) {
                        pinError.textContent = data.message;
                    }
                    errorBanner.textContent = data.message || 'Invalid or expired counter code. Please scan the QR standee again.';
                    errorBanner.style.display = 'block';
                } else if (data.errors) {

                    if (data.errors.name) nameError.textContent = data.errors.name[0];
                    if (data.errors.mobile) mobileError.textContent = data.errors.mobile[0];
                    if (data.errors.dob && dobError) dobError.textContent = data.errors.dob[0];
                    errorBanner.textContent = 'Please correct the highlighted fields.';
                    errorBanner.style.display = 'block';
                } else {
                    errorBanner.textContent = data.message || 'Registration failed. Please try again.';
                    errorBanner.style.display = 'block';
                }
            } catch (err) {
                errorBanner.textContent = 'Unable to connect to the store system. Please check with showroom counter staff.';
                errorBanner.style.display = 'block';
            } finally {
                submitBtn.disabled = false;
                btnSpinner.style.display = 'none';
                btnText.textContent = '✨ Activate VIP Pass & Digital Vault';
            }

        }
    </script>
</body>

</html>
