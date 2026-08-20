<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Vault Inactive | {{ $store['name'] ?? 'Maniratn Jewellers' }}</title>
    
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="icon" type="image/png" sizes="512x512" href="/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <meta name="theme-color" content="#5b0d13">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #09090b;
            --surface: #141419;
            --border-gold: rgba(212, 175, 55, 0.35);
            --gold-gradient: linear-gradient(135deg, #e5b958 0%, #fff0b8 50%, #c4962c 100%);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--bg);
            color: var(--text-primary);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            text-align: center;
        }

        .inactive-card {
            background: var(--surface);
            border: 1px solid var(--border-gold);
            border-radius: 1.5rem;
            padding: 2.5rem 1.75rem;
            max-width: 440px;
            width: 100%;
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.7);
        }

        .lock-icon-wrap {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: rgba(229, 185, 88, 0.1);
            border: 1px solid var(--border-gold);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.25rem auto;
            color: #e5b958;
        }

        h1 {
            font-size: 1.4rem;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        p {
            font-size: 0.85rem;
            color: var(--text-secondary);
            line-height: 1.5;
            margin-bottom: 2rem;
        }

        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.75rem 1.5rem;
            background: var(--gold-gradient);
            color: #120e06;
            border-radius: 0.65rem;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.82rem;
            letter-spacing: 0.03em;
        }
    </style>
</head>

<body>
    <div class="inactive-card">
        <div class="lock-icon-wrap">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
        </div>
        <h1>Pass Inactive</h1>
        <p>{{ $message ?? 'This digital vault pass is currently inactive or not found. Please visit our showroom for assistance.' }}</p>
        <a href="/" class="btn-home">
            Return to Store
        </a>
    </div>
</body>

</html>
