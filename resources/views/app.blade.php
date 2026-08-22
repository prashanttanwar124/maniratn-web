<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Inline script to detect system dark mode preference and apply it immediately --}}
        <script>
            (function() {
                const appearance = '{{ $appearance ?? "system" }}';

                if (appearance === 'system') {
                    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                    if (prefersDark) {
                        document.documentElement.classList.add('dark');
                    }
                }
            })();
        </script>

        {{-- Inline style to set the HTML background color based on our theme in app.css --}}
        <style>
            @font-face {
                font-family: 'Instrument Sans';
                src: url('{{ asset('fonts/instrument-sans-400.woff2') }}') format('woff2');
                font-style: normal;
                font-weight: 400;
                font-display: swap;
            }

            @font-face {
                font-family: 'Instrument Sans';
                src: url('{{ asset('fonts/instrument-sans-500.woff2') }}') format('woff2');
                font-style: normal;
                font-weight: 500;
                font-display: swap;
            }

            @font-face {
                font-family: 'Instrument Sans';
                src: url('{{ asset('fonts/instrument-sans-600.woff2') }}') format('woff2');
                font-style: normal;
                font-weight: 600;
                font-display: swap;
            }

            @font-face {
                font-family: 'Instrument Sans';
                src: url('{{ asset('fonts/instrument-sans-700.woff2') }}') format('woff2');
                font-style: normal;
                font-weight: 700;
                font-display: swap;
            }

            @font-face {
                font-family: 'DM Sans';
                src: url('{{ asset('fonts/dm-sans-300.woff2') }}') format('woff2');
                font-style: normal;
                font-weight: 300;
                font-display: swap;
            }

            @font-face {
                font-family: 'DM Sans';
                src: url('{{ asset('fonts/dm-sans-400.woff2') }}') format('woff2');
                font-style: normal;
                font-weight: 400;
                font-display: swap;
            }

            @font-face {
                font-family: 'DM Sans';
                src: url('{{ asset('fonts/dm-sans-500.woff2') }}') format('woff2');
                font-style: normal;
                font-weight: 500;
                font-display: swap;
            }

            @font-face {
                font-family: 'DM Sans';
                src: url('{{ asset('fonts/dm-sans-600.woff2') }}') format('woff2');
                font-style: normal;
                font-weight: 600;
                font-display: swap;
            }

            @font-face {
                font-family: 'DM Sans';
                src: url('{{ asset('fonts/dm-sans-700.woff2') }}') format('woff2');
                font-style: normal;
                font-weight: 700;
                font-display: swap;
            }

            @font-face {
                font-family: 'Cormorant Garamond';
                src: url('{{ asset('fonts/cormorant-garamond-300.woff2') }}') format('woff2');
                font-style: normal;
                font-weight: 300;
                font-display: swap;
            }

            @font-face {
                font-family: 'Cormorant Garamond';
                src: url('{{ asset('fonts/cormorant-garamond-400.woff2') }}') format('woff2');
                font-style: normal;
                font-weight: 400;
                font-display: swap;
            }

            @font-face {
                font-family: 'Cormorant Garamond';
                src: url('{{ asset('fonts/cormorant-garamond-500.woff2') }}') format('woff2');
                font-style: normal;
                font-weight: 500;
                font-display: swap;
            }

            @font-face {
                font-family: 'Cormorant Garamond';
                src: url('{{ asset('fonts/cormorant-garamond-600.woff2') }}') format('woff2');
                font-style: normal;
                font-weight: 600;
                font-display: swap;
            }

            @font-face {
                font-family: 'Cormorant Garamond';
                src: url('{{ asset('fonts/cormorant-garamond-700.woff2') }}') format('woff2');
                font-style: normal;
                font-weight: 700;
                font-display: swap;
            }

            @font-face {
                font-family: 'Cormorant Garamond';
                src: url('{{ asset('fonts/cormorant-garamond-300-italic.woff2') }}') format('woff2');
                font-style: italic;
                font-weight: 300;
                font-display: swap;
            }

            @font-face {
                font-family: 'Cormorant Garamond';
                src: url('{{ asset('fonts/cormorant-garamond-400-italic.woff2') }}') format('woff2');
                font-style: italic;
                font-weight: 400;
                font-display: swap;
            }

            @font-face {
                font-family: 'Cormorant Garamond';
                src: url('{{ asset('fonts/cormorant-garamond-500-italic.woff2') }}') format('woff2');
                font-style: italic;
                font-weight: 500;
                font-display: swap;
            }

            html {
                background-color: oklch(1 0 0);
            }

            html.dark {
                background-color: oklch(0.145 0 0);
            }
        </style>

        <link rel="icon" type="image/svg+xml" href="/favicon.svg">
        <link rel="icon" type="image/png" sizes="512x512" href="/favicon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <meta name="theme-color" content="#5b0d13">

        <!-- Core SEO Meta Tags -->
        <meta name="description" content="Maniratn Jewellers — Trusted fine jewellery partner since 2007 for BIS 916 hallmarked gold, certified diamonds, antique bridal sets & custom heirloom jewellery in Virar, Maharashtra.">
        <meta name="keywords" content="Maniratn Jewellers, jewellery shop in Virar, gold jewellery Virar, 916 hallmarked gold, diamond bridal necklace, gold rate today Virar, antique temple jewellery, gold savings scheme Virar, silver artifacts">
        <meta name="author" content="Maniratn Jewellers">
        <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
        <link rel="canonical" href="{{ url()->current() }}">

        <!-- Geo & Local SEO Tags -->
        <meta name="geo.region" content="IN-MH">
        <meta name="geo.placename" content="Virar, Maharashtra, India">
        <meta name="geo.position" content="19.4564;72.8116">
        <meta name="ICBM" content="19.4564, 72.8116">

        <!-- Open Graph / Facebook / WhatsApp -->
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Maniratn Jewellers">
        <meta property="og:locale" content="en_IN">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="Maniratn Jewellers — BIS 916 Hallmarked Gold & Bridal Jewellery">
        <meta property="og:description" content="Discover timeless elegance with BIS 916 Hallmarked Gold, Certified Diamonds & Handcrafted Bridal Jewellery at Maniratn Jewellers Virar.">
        <meta property="og:image" content="{{ asset('favicon.png') }}">

        <!-- Twitter Cards -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Maniratn Jewellers — BIS 916 Hallmarked Gold & Bridal Jewellery">
        <meta name="twitter:description" content="Discover timeless elegance with BIS 916 Hallmarked Gold, Certified Diamonds & Handcrafted Bridal Jewellery at Maniratn Jewellers Virar.">
        <meta name="twitter:image" content="{{ asset('favicon.png') }}">

        <!-- Structured Data / JSON-LD Schema -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "JewelryStore",
            "@id": "https://maniratnjewellers.com/#store",
            "name": "Maniratn Jewellers",
            "legalName": "Maniratn Jewellers",
            "image": "{{ asset('favicon.png') }}",
            "description": "Exclusive BIS Hallmarked 916 Gold, Certified Diamond, Antique & Silver Jewellery showroom in Virar, Maharashtra since 2007.",
            "url": "https://maniratnjewellers.com",
            "telephone": "+919820112233",
            "priceRange": "₹₹₹",
            "currenciesAccepted": "INR",
            "paymentAccepted": "Cash, Credit Card, Debit Card, UPI, Net Banking",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Virar West",
                "addressLocality": "Virar",
                "addressRegion": "Maharashtra",
                "postalCode": "401303",
                "addressCountry": "IN"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": 19.4564,
                "longitude": 72.8116
            },
            "openingHoursSpecification": [
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": [
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday",
                        "Sunday"
                    ],
                    "opens": "10:00",
                    "closes": "21:00"
                }
            ],
            "sameAs": [
                "https://www.instagram.com/maniratnjewellers",
                "https://www.facebook.com/maniratnjewellers"
            ]
        }
        </script>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "@id": "https://maniratnjewellers.com/#website",
            "url": "https://maniratnjewellers.com",
            "name": "Maniratn Jewellers",
            "description": "BIS 916 Hallmarked Gold, Certified Diamonds & Antique Bridal Jewellery in Virar since 2007",
            "publisher": {
                "@id": "https://maniratnjewellers.com/#store"
            }
        }
        </script>

        @vite(['resources/css/app.css', 'resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
        <x-inertia::head>
            <title>{{ config('app.name', 'Maniratn Jewellers') }}</title>
        </x-inertia::head>
    </head>
    <body class="font-sans antialiased">
        <x-inertia::app />
    </body>
</html>
