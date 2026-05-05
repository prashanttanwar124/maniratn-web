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

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        @vite(['resources/css/app.css', 'resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
        <x-inertia::head>
            <title>{{ config('app.name', 'Laravel') }}</title>
        </x-inertia::head>
    </head>
    <body class="font-sans antialiased">
        <x-inertia::app />
    </body>
</html>
