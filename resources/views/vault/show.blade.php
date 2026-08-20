<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>{{ $customer['name'] ?? 'Client' }} — Digital Jewellery Vault</title>
    
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="icon" type="image/png" sizes="512x512" href="/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <meta name="theme-color" content="#5b0d13">

    <!-- Premium Google Fonts: Outfit & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #09090b;
            --surface: #121215;
            --surface-card: #18181d;
            --surface-elevated: #22222a;
            --border-subtle: rgba(255, 255, 255, 0.08);
            --border-gold: rgba(212, 175, 55, 0.28);
            --gold-primary: #d4af37;
            --gold-light: #f3e5ab;
            --gold-gradient: linear-gradient(135deg, #d4af37 0%, #f3e5ab 50%, #aa771c 100%);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            --accent-green: #10b981;
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
            background: rgba(9, 9, 11, 0.92);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border-subtle);
            padding: 0.85rem 1.25rem;
        }

        .header-inner {
            max-width: 680px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand-logo-wrap {
            display: flex;
            align-items: center;
            gap: 0.6rem;
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

        .verified-badge {
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--accent-green);
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.25);
            padding: 0.25rem 0.6rem;
            border-radius: 0.35rem;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        .main-container {
            max-width: 680px;
            margin: 0 auto;
            padding: 1.25rem 1rem;
        }

        /* Client Vault Header Card */
        .vault-hero {
            background: var(--surface);
            border: 1px solid var(--border-subtle);
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 1.25rem;
            position: relative;
        }

        .vault-hero-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding-bottom: 0.65rem;
        }

        .vault-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--gold-primary);
        }

        .nfc-tag {
            font-size: 0.72rem;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .client-name {
            font-family: 'Outfit', sans-serif;
            font-size: 1.55rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.2;
            margin-bottom: 0.35rem;
        }

        .client-details {
            font-size: 0.8rem;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 0.4rem;
            flex-wrap: wrap;
        }

        .client-details strong {
            color: var(--gold-light);
            font-weight: 600;
        }

        /* Metric Grid */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.5rem;
            margin-top: 1.25rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .metric-item {
            text-align: center;
        }

        .metric-title {
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            display: block;
        }

        .metric-val {
            font-family: 'Outfit', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: #ffffff;
            margin-top: 0.15rem;
        }

        .metric-gold { color: var(--gold-primary); }

        /* Minimal Tab Bar */
        .tabs-nav {
            background: var(--surface);
            border: 1px solid var(--border-subtle);
            border-radius: 0.5rem;
            padding: 0.25rem;
            display: flex;
            gap: 0.25rem;
            margin-bottom: 1.25rem;
            overflow-x: auto;
            scrollbar-width: none;
        }
        .tabs-nav::-webkit-scrollbar { display: none; }

        .tab-btn {
            flex: 1;
            min-width: fit-content;
            background: transparent;
            border: none;
            color: var(--text-secondary);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.78rem;
            font-weight: 600;
            padding: 0.55rem 0.85rem;
            border-radius: 0.4rem;
            cursor: pointer;
            transition: all 0.15s ease;
            white-space: nowrap;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
        }

        .tab-btn.active {
            background: var(--surface-elevated);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .tab-pane {
            display: none;
        }
        .tab-pane.active {
            display: block;
            animation: fadeIn 0.2s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(4px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Clean Item Card */
        .item-card {
            background: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: 0.65rem;
            padding: 1.15rem;
            margin-bottom: 0.75rem;
            transition: border-color 0.15s ease;
        }

        .item-card:hover {
            border-color: var(--border-gold);
        }

        .item-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
        }

        .item-name {
            font-family: 'Outfit', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: #ffffff;
        }

        .item-sub {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-top: 0.1rem;
        }

        .purity-tag {
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.2rem 0.55rem;
            border-radius: 0.35rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            background: rgba(212, 175, 55, 0.15);
            color: var(--gold-light);
            border: 1px solid var(--border-gold);
            white-space: nowrap;
        }

        .purity-silver {
            background: rgba(148, 163, 184, 0.12);
            color: #cbd5e1;
            border-color: rgba(148, 163, 184, 0.25);
        }

        .weight-grid {
            background: rgba(9, 9, 11, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.04);
            border-radius: 0.45rem;
            padding: 0.75rem;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.5rem;
            margin-bottom: 0.75rem;
        }

        .weight-label {
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            color: var(--text-muted);
            display: block;
        }

        .weight-val {
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            color: #ffffff;
            margin-top: 0.1rem;
        }

        .huid-row {
            grid-column: span 2;
            padding-top: 0.45rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .huid-val {
            font-family: monospace;
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--gold-primary);
        }

        .item-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.75rem;
            color: var(--text-secondary);
            padding-top: 0.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Invoice Row */
        .invoice-row {
            background: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: 0.65rem;
            padding: 1.15rem;
            margin-bottom: 0.75rem;
            display: flex;
            flex-direction: column;
            gap: 0.85rem;
        }

        @media (min-width: 500px) {
            .invoice-row {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }
        }

        .inv-number {
            font-family: 'Outfit', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: #ffffff;
        }

        .inv-date {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-top: 0.15rem;
        }

        .inv-amount-val {
            font-family: 'Outfit', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--gold-primary);
        }

        .btn-view-bill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            padding: 0.55rem 1rem;
            background: var(--gold-gradient);
            color: #120e06;
            border-radius: 0.45rem;
            font-size: 0.78rem;
            font-weight: 700;
            text-decoration: none;
            transition: opacity 0.15s ease;
            white-space: nowrap;
        }
        .btn-view-bill:hover { opacity: 0.9; }

        /* Store Box */
        .concierge-card {
            background: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: 0.75rem;
            padding: 1.75rem 1.25rem;
            text-align: center;
        }

        .concierge-store-name {
            font-family: 'Outfit', sans-serif;
            font-size: 1.35rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.35rem;
        }

        .concierge-addr {
            font-size: 0.82rem;
            color: var(--text-secondary);
            max-width: 440px;
            margin: 0 auto 1.25rem auto;
            line-height: 1.4;
        }

        .concierge-btn-group {
            display: flex;
            gap: 0.65rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-phone {
            padding: 0.65rem 1.25rem;
            background: var(--surface-elevated);
            border: 1px solid var(--border-subtle);
            color: #ffffff;
            border-radius: 0.45rem;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-wa {
            padding: 0.65rem 1.25rem;
            background: #059669;
            color: #ffffff;
            border-radius: 0.45rem;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .empty-box {
            text-align: center;
            padding: 3.5rem 1.5rem;
            background: var(--surface-card);
            border: 1px dashed var(--border-subtle);
            border-radius: 0.65rem;
            color: var(--text-secondary);
        }
    </style>
</head>

<body>
    <!-- Top Header -->
    <header class="brand-header">
        <div class="header-inner">
            <div class="brand-logo-wrap">
                <span class="brand-logo-text">{{ $store['name'] ?? 'Maniratn' }} <span class="brand-logo-gold">Vault</span></span>
            </div>
            <div class="verified-badge">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Verified Pass
            </div>
        </div>
    </header>

    <div class="main-container">
        <!-- Client Vault Card -->
        <section class="vault-hero">
            <div class="vault-hero-top">
                <span class="vault-label">Official Client Pass</span>
                <span class="nfc-tag">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8.32a7.43 7.43 0 0 1 0 7.36"></path><path d="M9.46 6.21a11.76 11.76 0 0 1 0 11.58"></path><path d="M12.91 4.1a15.91 15.91 0 0 1 0 15.8"></path><path d="M16.37 2a20.16 20.16 0 0 1 0 20"></path></svg>
                    NFC Connected
                </span>
            </div>

            <h1 class="client-name">{{ $customer['name'] ?? 'Valued Client' }}</h1>

            <div class="client-details">
                @if(!empty($customer['membership_id']))
                    <span>VIP Member: <strong>{{ $customer['membership_id'] }}</strong></span>
                    <span>•</span>
                @endif
                @if(!empty($customer['city']))
                    <span>{{ $customer['city'] }}</span>
                    <span>•</span>
                @endif
                <span style="color: var(--accent-green);">Authenticated</span>
            </div>

            <!-- Numbers -->
            <div class="metrics-grid">
                <div class="metric-item">
                    <span class="metric-title">Jewellery</span>
                    <div class="metric-val">{{ $stats['total_items'] ?? 0 }}</div>
                </div>
                <div class="metric-item">
                    <span class="metric-title">Gold Wt</span>
                    <div class="metric-val metric-gold">{{ $stats['total_gold_weight'] ?? 0 }}<span style="font-size: 0.75rem; font-weight: 500; margin-left: 2px;">g</span></div>
                </div>
                <div class="metric-item">
                    <span class="metric-title">Silver Wt</span>
                    <div class="metric-val">{{ $stats['total_silver_weight'] ?? 0 }}<span style="font-size: 0.75rem; font-weight: 500; margin-left: 2px; color: var(--text-muted);">g</span></div>
                </div>
                <div class="metric-item">
                    <span class="metric-title">Bills</span>
                    <div class="metric-val" style="color: var(--accent-green);">{{ $stats['total_invoices'] ?? 0 }}</div>
                </div>
            </div>
        </section>

        <!-- Segmented Tab Navigation -->
        <nav class="tabs-nav">
            <button class="tab-btn active" onclick="setTab('items', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"></circle><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"></path></svg>
                Jewellery ({{ count($items ?? []) }})
            </button>
            <button class="tab-btn" onclick="setTab('invoices', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                Bills ({{ count($invoices ?? []) }})
            </button>
            @if(!empty($gold_schemes) && count($gold_schemes) > 0)
                <button class="tab-btn" onclick="setTab('schemes', this)">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="8" r="6"></circle><path d="M18.09 10.37A6 6 0 1 1 10.34 18"></path><path d="m7 6 5 5"></path><path d="m12 6 5 5"></path></svg>
                    Schemes ({{ count($gold_schemes) }})
                </button>
            @endif
            <button class="tab-btn" onclick="setTab('store', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                Concierge
            </button>
        </nav>

        <!-- TAB 1: Jewellery Collection -->
        <div id="tab-items" class="tab-pane active">
            @if(empty($items) || count($items) === 0)
                <div class="empty-box">
                    <p style="font-weight: 600; color: #ffffff; margin-bottom: 0.25rem;">No Jewellery Pieces Recorded</p>
                    <p style="font-size: 0.78rem;">Purchases from Maniratn Jewellers will automatically sync to your vault.</p>
                </div>
            @else
                @foreach($items as $item)
                    <article class="item-card">
                        <div class="item-top">
                            <div>
                                <h2 class="item-name">{{ $item['description'] ?? 'Jewellery Piece' }}</h2>
                                <p class="item-sub">{{ $item['category'] ?? 'Gold Jewellery' }}</p>
                            </div>
                            <span class="purity-tag {{ ($item['metal'] ?? '') === 'SILVER' ? 'purity-silver' : '' }}">
                                {{ $item['purity'] ?? '22K' }}
                            </span>
                        </div>

                        <div class="weight-grid">
                            <div>
                                <span class="weight-label">Gross Weight</span>
                                <span class="weight-val">{{ $item['gross_weight'] ?? 0 }} g</span>
                            </div>
                            <div>
                                <span class="weight-label">Net Weight</span>
                                <span class="weight-val">{{ $item['net_weight'] ?? 0 }} g</span>
                            </div>
                            @if(!empty($item['huid']))
                                <div class="huid-row">
                                    <span class="weight-label">BIS HUID Hallmark</span>
                                    <span class="huid-val">{{ $item['huid'] }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="item-bottom">
                            <span>{{ date('d M Y', strtotime($item['date'] ?? 'now')) }} • Bill #{{ $item['invoice_number'] ?? '' }}</span>
                            <span style="color: var(--accent-green); font-weight: 600;">✓ Hallmarked</span>
                        </div>
                    </article>
                @endforeach
            @endif
        </div>

        <!-- TAB 2: Invoices -->
        <div id="tab-invoices" class="tab-pane">
            @if(empty($invoices) || count($invoices) === 0)
                <div class="empty-box">
                    <p style="font-weight: 600; color: #ffffff; margin-bottom: 0.25rem;">No Invoices Recorded</p>
                    <p style="font-size: 0.78rem;">Official tax bills will appear here.</p>
                </div>
            @else
                @foreach($invoices as $inv)
                    <div class="invoice-row">
                        <div>
                            <div class="inv-number">Invoice #{{ $inv['invoice_number'] ?? '' }}</div>
                            <div class="inv-date">
                                {{ date('d M Y', strtotime($inv['date'] ?? 'now')) }} • {{ $inv['items_count'] ?? 1 }} {{ ($inv['items_count'] ?? 1) > 1 ? 'Items' : 'Item' }}
                            </div>
                        </div>

                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 1.25rem;">
                            <div style="text-align: right;">
                                <span style="font-size: 0.65rem; color: var(--text-muted); text-transform: uppercase; font-weight: 600; display: block;">Total Paid</span>
                                <span class="inv-amount-val">₹{{ number_format($inv['total_amount'] ?? 0, 2) }}</span>
                            </div>

                            @if(!empty($inv['id']))
                                <a href="{{ route('vault.invoice.print', ['token' => $token, 'invoice' => $inv['secure_key'] ?? $inv['id']]) }}" target="_blank" class="btn-view-bill">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                    View Bill
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- TAB 3: Schemes -->
        @if(!empty($gold_schemes) && count($gold_schemes) > 0)
            <div id="tab-schemes" class="tab-pane">
                @foreach($gold_schemes as $scheme)
                    <div class="item-card">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="font-size: 1.05rem; font-weight: 700; color: #ffffff; font-family: 'Outfit', sans-serif;">
                                {{ $scheme['scheme_name'] ?? 'Gold Scheme' }}
                            </h3>
                            <span class="purity-tag" style="background: rgba(16, 185, 129, 0.15); color: #34d399; border-color: rgba(16, 185, 129, 0.3);">
                                {{ $scheme['status'] ?? 'ACTIVE' }}
                            </span>
                        </div>

                        <div style="background: rgba(0, 0, 0, 0.4); border: 1px solid var(--border-subtle); height: 6px; border-radius: 9999px; overflow: hidden; margin: 0.85rem 0;">
                            <div style="height: 100%; background: var(--gold-gradient); width: {{ ($scheme['total_installments'] ?? 0) > 0 ? (($scheme['paid_installments'] ?? 0) / $scheme['total_installments']) * 100 : 0 }}%;"></div>
                        </div>

                        <div class="weight-grid" style="grid-template-columns: repeat(3, 1fr);">
                            <div>
                                <span class="weight-label">Installments</span>
                                <span class="weight-val">{{ $scheme['paid_installments'] ?? 0 }} / {{ $scheme['total_installments'] ?? 0 }}</span>
                            </div>
                            <div>
                                <span class="weight-label">Total Paid</span>
                                <span class="weight-val">₹{{ number_format($scheme['total_paid'] ?? 0) }}</span>
                            </div>
                            <div>
                                <span class="weight-label">Gold Saved</span>
                                <span class="weight-val metric-gold">{{ $scheme['accumulated_weight'] ?? 0 }} g</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- TAB 4: Concierge -->
        <div id="tab-store" class="tab-pane">
            <div class="concierge-card">
                <h2 class="concierge-store-name">{{ $store['name'] ?? 'Maniratn Jewellers' }}</h2>
                @if(!empty($store['address']))
                    <p class="concierge-addr">{{ $store['address'] }}</p>
                @endif

                <div class="concierge-btn-group">
                    @if(!empty($store['phone']))
                        <a href="tel:{{ $store['phone'] }}" class="btn-phone">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            Call Showroom
                        </a>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $store['phone']) }}?text={{ urlencode('Hello Maniratn Jewellers, I am inquiring regarding my Digital Vault.') }}" target="_blank" class="btn-wa">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path></svg>
                            WhatsApp Concierge
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function setTab(key, btn) {
            document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));

            const target = document.getElementById('tab-' + key);
            if (target) target.classList.add('active');
            if (btn) btn.classList.add('active');
        }
    </script>
</body>

</html>
