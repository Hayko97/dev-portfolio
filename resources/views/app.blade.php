<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        @php
            $appName = config('app.name', 'Portfolio');
            $appUrl = config('app.url', url('/'));
            $locale = str_replace('_', '-', app()->getLocale());
            $defaultDescription = $appName . ' — Software Engineer & Full‑Stack Developer portfolio. Building scalable web apps with Laravel, Vue, TypeScript, and AWS. Contact & resume.';
        @endphp

        <!-- SEO: Canonical & Robots -->
        <link rel="canonical" href="{{ request()->url() }}">
        @if (app()->environment('production'))
            <meta name="robots" content="index, follow">
        @else
            <meta name="robots" content="noindex, nofollow">
        @endif

        <!-- Primary SEO Meta -->
        <meta name="title" content="{{ $appName }} | Software Engineer & Full‑Stack Developer">
        <meta name="description" content="{{ $defaultDescription }}">
        <meta name="author" content="{{ $appName }}">
        <meta name="keywords" content="software engineer, software developer, full stack developer, laravel developer, vue.js, typescript, web developer, portfolio, backend developer, frontend developer, api, microservices, aws, devops">
        <meta name="theme-color" content="#0f172a">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="{{ $appName }}">
        <meta property="og:locale" content="{{ $locale }}">
        <meta property="og:url" content="{{ request()->url() }}">
        <meta property="og:title" content="{{ $appName }} | Software Engineer & Full‑Stack Developer">
        <meta property="og:description" content="{{ $defaultDescription }}">
        @if (file_exists(public_path('me.jpg')))
            <meta property="og:image" content="{{ asset('me.jpg') }}">
            <meta property="og:image:alt" content="{{ $appName }} — Portfolio">
        @endif

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $appName }} | Software Engineer & Full‑Stack Developer">
        <meta name="twitter:description" content="{{ $defaultDescription }}">
        @if (file_exists(public_path('me.jpg')))
            <meta name="twitter:image" content="{{ asset('me.jpg') }}">
        @endif

        <!-- Language & Alternates -->
        <link rel="alternate" href="{{ $appUrl }}" hreflang="{{ $locale }}">
        <link rel="alternate" href="{{ $appUrl }}" hreflang="x-default">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Icons (conditionally included if present in /public) -->
        @if (file_exists(public_path('favicon.ico')))
            <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
        @endif
        @if (file_exists(public_path('favicon.svg')))
            <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
        @endif
        @if (file_exists(public_path('apple-touch-icon.png')))
            <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
        @endif
        @if (file_exists(public_path('site.webmanifest')))
            <link rel="manifest" href="{{ asset('site.webmanifest') }}">
        @endif

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.ts', "resources/js/Pages/{$page['component']}.vue"])

        <!-- Structured Data (JSON-LD) -->
        @php
            $ld = [
                '@context' => 'https://schema.org',
                '@graph' => [
                    [
                        '@type' => 'WebSite',
                        '@id' => $appUrl . '#website',
                        'url' => $appUrl,
                        'name' => $appName,
                        'description' => $defaultDescription,
                        'inLanguage' => $locale,
                        'potentialAction' => [
                            '@type' => 'SearchAction',
                            'target' => $appUrl . '/search?q={search_term_string}',
                            'query-input' => 'required name=search_term_string',
                        ],
                    ],
                    [
                        '@type' => 'Person',
                        '@id' => $appUrl . '#person',
                        'name' => $appName,
                        'jobTitle' => 'Software Engineer',
                        'url' => $appUrl,
                        'knowsAbout' => [
                            'Software Engineering', 'Full‑Stack Development', 'Laravel', 'Vue.js', 'TypeScript', 'REST APIs', 'AWS', 'Tailwind CSS'
                        ],
                    ],
                ],
            ];
        @endphp
        <script type="application/ld+json">{!! json_encode($ld, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
