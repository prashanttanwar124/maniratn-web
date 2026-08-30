<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Join Maniratn Privé — VIP Walk-in Registration & Digital Vault</title>
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="Register your VIP membership with Maniratn Jewellers for instant Smart Digital Gold Vault, certificates, and anniversary privileges.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <meta name="theme-color" content="#09090b">

    <!-- Premium Google Fonts: Outfit & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #09090b;
            --surface: #121216;
            --surface-card: #17171e;
            --surface-elevated: #20202a;
            --border-subtle: rgba(255, 255, 255, 0.1);
            --border-gold: rgba(212, 175, 55, 0.38);
            --gold-primary: #d4af37;
            --gold-light: #f3e5ab;
            --gold-gradient: linear-gradient(135deg, #d4af37 0%, #f3e5ab 50%, #aa771c 100%);
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
            padding-bottom: 4rem;
        }

        /* Top Header */
        .brand-header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(9, 9, 11, 0.95);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border-subtle);
            padding: 0.85rem 1.25rem;
        }

        .header-inner {
            max-width: 540px;
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
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            color: #ffffff;
            text-transform: uppercase;
        }

        .brand-logo-gold {
            background: var(--gold-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .vip-badge {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--gold-primary);
            background: rgba(212, 175, 55, 0.12);
            border: 1px solid var(--border-gold);
            padding: 0.25rem 0.65rem;
            border-radius: 0.35rem;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        .main-container {
            max-width: 540px;
            margin: 0 auto;
            padding: 1.25rem 1rem;
        }

        /* Hero Onboarding Card */
        .onboarding-hero {
            background: var(--surface);
            border: 1px solid var(--border-subtle);
            border-radius: 1rem;
            padding: 1.5rem 1.25rem;
            margin-bottom: 1.25rem;
            position: relative;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.6);
            background-image: radial-gradient(circle at 50% 0%, rgba(212, 175, 55, 0.1) 0%, transparent 75%);
        }

        .hero-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            padding-bottom: 0.65rem;
        }

        .hero-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--gold-primary);
        }

        .verified-standee {
            font-size: 0.7rem;
            color: var(--accent-green);
            display: flex;
            align-items: center;
            gap: 0.35rem;
            font-weight: 600;
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
            font-size: 1.65rem;
            font-weight: 800;
            color: #ffffff;
            line-height: 1.2;
            margin-bottom: 0.35rem;
        }

        .hero-desc {
            font-size: 0.82rem;
            color: var(--text-secondary);
            line-height: 1.5;
        }

        /* Form Controls */
        .form-grid {
            display: flex;
            flex-direction: column;
            gap: 1.15rem;
            margin-top: 1.25rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .form-label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-label .req {
            color: var(--gold-primary);
            font-weight: 800;
        }

        .form-label .optional-tag {
            font-size: 0.65rem;
            color: var(--text-muted);
            font-weight: 500;
            text-transform: none;
            letter-spacing: normal;
        }

        .input-wrap {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
        }

        .input-prefix {
            position: absolute;
            left: 0.95rem;
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--gold-primary);
            pointer-events: none;
            font-family: 'Outfit', sans-serif;
            z-index: 2;
        }

        .input-control {
            width: 100%;
            height: 48px;
            background: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: 0.65rem;
            padding: 0 0.95rem;
            color: #ffffff;
            font-size: 16px; /* Prevents auto-zoom on iPhone */
            font-family: inherit;
            outline: none;
            transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
            color-scheme: dark; /* Dark mode native calendar popup */
        }

        .input-control:focus {
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.25);
            background: #1d1d26;
        }

        .input-control.with-prefix {
            padding-left: 3.1rem;
            font-family: 'Outfit', monospace;
            font-weight: 600;
            letter-spacing: 0.06em;
        }

        .form-hint {
            font-size: 0.72rem;
            color: var(--text-muted);
            line-height: 1.35;
        }

        .form-error {
            font-size: 0.74rem;
            color: var(--accent-red);
            margin-top: 0.15rem;
            font-weight: 600;
        }

        /* Gold Submit Button */
        .btn-gold {
            width: 100%;
            height: 52px;
            background: var(--gold-gradient);
            color: #09090b;
            border: none;
            border-radius: 0.75rem;
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            font-weight: 800;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 0.5rem;
            box-shadow: 0 4px 20px rgba(212, 175, 55, 0.3);
            transition: transform 0.1s ease, filter 0.15s ease;
        }

        .btn-gold:hover {
            filter: brightness(1.08);
        }

        .btn-gold:active {
            transform: scale(0.98);
        }

        .btn-gold:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            filter: none;
        }

        .spinner {
            width: 18px;
            height: 18px;
            border: 2.5px solid #09090b;
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
            padding: 1rem 0;
        }

        .vip-card-preview {
            background: linear-gradient(135deg, #162924 0%, #101c19 50%, #0a110f 100%);
            border: 2px solid var(--border-gold);
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: left;
            margin: 1.25rem 0;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 35px -5px rgba(0, 0, 0, 0.7);
        }

        .vip-card-preview::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.2) 0%, transparent 70%);
            pointer-events: none;
        }

        .vip-card-badge {
            font-size: 0.65rem;
            font-weight: 800;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold-primary);
        }

        .vip-card-name {
            font-family: 'Outfit', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: #ffffff;
            margin: 0.35rem 0 0.15rem;
        }

        .vip-card-phone {
            font-size: 0.8rem;
            color: var(--text-secondary);
            font-family: 'Outfit', monospace;
        }

        .vip-card-bottom {
            margin-top: 1.5rem;
            padding-top: 0.85rem;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
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
            border-radius: 0.65rem;
            padding: 0.85rem 0.5rem;
            text-align: center;
        }

        .perk-icon {
            font-size: 1.35rem;
            margin-bottom: 0.25rem;
            display: block;
        }

        .perk-title {
            font-family: 'Outfit', sans-serif;
            font-size: 0.72rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.2rem;
        }

        .perk-desc {
            font-size: 0.65rem;
            color: var(--text-muted);
            line-height: 1.35;
        }

        .error-banner {
            display: none;
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.35);
            border-radius: 0.65rem;
            padding: 0.85rem 1rem;
            margin-bottom: 1rem;
            font-size: 0.82rem;
            color: #fca5a5;
            font-weight: 500;
        }

        .footer-note {
            text-align: center;
            font-size: 0.72rem;
            color: var(--text-muted);
            margin-top: 2rem;
            line-height: 1.6;
        }

        .footer-note strong {
            color: var(--text-secondary);
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
            <div class="vip-badge">
                ✨ PRIVÉ VIP CLUB
            </div>
        </div>
    </header>

    <main class="main-container">
        <!-- Error Banner -->
        <div id="errorBanner" class="error-banner"></div>

        <!-- FORM SECTION -->
        <section id="formSection" class="onboarding-hero">
            <div class="hero-top">
                <span class="hero-label">👑 VIP Walk-In Registration</span>
                <span class="verified-standee">
                    <span class="status-dot"></span>
                    Verified Showroom Standee
                </span>
            </div>

            <h1 class="hero-title">Join Maniratn Privé</h1>
            <p class="hero-desc">
                Register in 30 seconds for your personal <strong>Smart Digital Gold Vault</strong>, lifetime jewellery passbook, and anniversary rewards.
            </p>

            <form id="onboardingForm" class="form-grid" onsubmit="handleOnboardingSubmit(event)">
                <input type="hidden" id="tokenInput" name="token" value="{{ $initialCode ?? '' }}">
                <input type="hidden" id="pinInput" name="pin" value="{{ $initialPin ?? '' }}">

                @if (empty($initialCode))
                <div class="form-group">
                    <label class="form-label" for="manualToken">
                        <span>Counter Token <span class="req">*</span></span>
                    </label>
                    <input type="text" id="manualToken" class="input-control" placeholder="karatsetu_..." value="{{ $initialCode ?? '' }}" required>
                    <span class="form-hint">Scan the showroom counter standee QR code to auto-fill.</span>
                </div>
                @endif

                <!-- Full Name -->
                <div class="form-group">
                    <label class="form-label" for="nameInput">
                        <span>Full Name <span class="req">*</span></span>
                    </label>
                    <input type="text" id="nameInput" class="input-control" placeholder="e.g. Rajesh S. Sharma" required autocomplete="name">
                    <div id="nameError" class="form-error"></div>
                </div>

                <!-- Mobile Number -->
                <div class="form-group">
                    <label class="form-label" for="mobileInput">
                        <span>Mobile Number <span class="req">*</span></span>
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
                        <span>Date of Birth 🎂 <span class="req">*</span></span>
                    </label>
                    <input type="date" id="dobInput" class="input-control" required>
                    <span class="form-hint">Required for your exclusive birthday gold discount voucher.</span>
                    <div id="dobError" class="form-error"></div>
                </div>

                <!-- Wedding Anniversary (Optional) -->
                <div class="form-group">
                    <label class="form-label" for="anniversaryInput">
                        <span>Wedding Anniversary 💍</span>
                        <span class="optional-tag">Optional</span>
                    </label>
                    <input type="date" id="anniversaryInput" class="input-control">
                    <span class="form-hint">Celebrate your special day with anniversary rewards.</span>
                </div>

                <!-- City / Town -->
                <div class="form-group">
                    <label class="form-label" for="cityInput">
                        <span>City / Town</span>
                        <span class="optional-tag">Optional</span>
                    </label>
                    <input type="text" id="cityInput" class="input-control" placeholder="e.g. Virar West / Mumbai" value="Virar">
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label class="form-label" for="emailInput">
                        <span>Email Address</span>
                        <span class="optional-tag">Optional</span>
                    </label>
                    <input type="email" id="emailInput" class="input-control" placeholder="name@example.com" autocomplete="email">
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
                <div class="vip-badge" style="margin-bottom: 0.75rem;">
                    ✨ MEMBERSHIP ACTIVATED
                </div>

                <h1 class="hero-title">Welcome to Privé!</h1>
                <p class="hero-desc" id="successCustomerMessage">
                    Your exclusive membership and Smart Digital Gold Vault have been created.
                </p>

                <!-- VIP Card Display -->
                <div class="vip-card-preview">
                    <div class="vip-card-badge">MANIRATN JEWELLERS PRIVÉ</div>
                    <div id="cardHolderName" class="vip-card-name">Customer Name</div>
                    <div id="cardHolderPhone" class="vip-card-phone">+91 98XXXXXXXX</div>

                    <div class="vip-card-bottom">
                        <div>
                            <span style="font-size: 0.65rem; color: var(--text-muted); text-transform: uppercase;">Digital Pass Status</span>
                            <div style="font-size: 0.75rem; font-weight: 700; color: var(--accent-green); display: flex; align-items: center; gap: 0.35rem; margin-top: 0.1rem;">
                                <span class="status-dot"></span> Active & Verified
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <span style="font-size: 0.65rem; color: var(--text-muted); text-transform: uppercase;">Showroom</span>
                            <div style="font-size: 0.75rem; font-weight: 600; color: var(--gold-light); margin-top: 0.1rem;">Virar West</div>
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

        <div class="footer-note">
            <p><strong>Maniratn Jewellers</strong> • Fine Gold & Diamond Jewellery</p>
            <p>Bolinj Rd, Gokul Twp, Virar West, Maharashtra 401303 • +91 98928 20518</p>
        </div>
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
            var submitBtn = document.getElementById('submitBtn');
            var btnSpinner = document.getElementById('btnSpinner');
            var btnText = document.getElementById('btnText');

            errorBanner.style.display = 'none';
            nameError.textContent = '';
            mobileError.textContent = '';
            if (dobError) dobError.textContent = '';

            var token = document.getElementById('tokenInput').value || (document.getElementById('manualToken') ? document.getElementById('manualToken').value : '');
            var pin = document.getElementById('pinInput').value || '';
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
            btnText.textContent = 'Activating Membership...';

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
