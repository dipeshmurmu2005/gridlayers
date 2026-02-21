@props(['seo'])
@if ($seo)
    {{-- Basic --}}
    <title>{{ $seo->meta_title ?? $seo->title }}</title>
    <meta name="description" content="{{ $seo->meta_description }}">
    @if ($seo->meta_keywords)
        <meta name="keywords" content="{{ $seo->meta_keywords }}">
    @endif

    {{-- Canonical --}}
    @if ($seo->canonical_url)
        <link rel="canonical" href="{{ $seo->canonical_url }}">
    @endif

    {{-- Robots --}}
    <meta name="robots" content="{{ $seo->index ? 'index' : 'noindex' }},{{ $seo->follow ? 'follow' : 'nofollow' }}">

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ $seo->og_title ?? $seo->meta_title }}">
    <meta property="og:description" content="{{ $seo->og_description ?? $seo->meta_description }}">
    <meta property="og:type" content="{{ $seo->og_type }}">
    <meta property="og:url" content="{{ url()->current() }}">
    @if ($seo->og_image)
        <meta property="og:image" content="{{ asset($seo->og_image) }}">
    @endif

    {{-- Twitter --}}
    <meta name="twitter:card" content="{{ $seo->twitter_card }}">
    <meta name="twitter:title" content="{{ $seo->twitter_title ?? $seo->meta_title }}">
    <meta name="twitter:description" content="{{ $seo->twitter_description ?? $seo->meta_description }}">
    @if ($seo->twitter_image)
        <meta name="twitter:image" content="{{ asset($seo->twitter_image) }}">
    @endif

    {{-- Schema --}}
    @if ($seo->schema_markup)
        <script type="application/ld+json">
            {!! json_encode($seo->schema_markup, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>
    @endif

    {{-- Extra Meta --}}
    @if ($seo->extra_meta)
        @foreach ($seo->extra_meta as $name => $content)
            <meta name="{{ $name }}" content="{{ $content }}">
        @endforeach
    @endif
@endif
