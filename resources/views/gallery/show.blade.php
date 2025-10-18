@extends('layouts.app')

@section('title', $galleryItem->title . ' — Galeri Jayatour')

@section('content')
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a><span>›</span>
        <a href="{{ route('gallery.index') }}">Galeri</a><span>›</span>
        {{ $galleryItem->title }}
    </div>

    <article class="card" style="padding: 0; overflow: hidden;">
        <img src="{{ $galleryItem->image_url }}" alt="{{ $galleryItem->title }}" style="width: 100%; max-height: 520px; object-fit: cover;">
        <div style="padding: 2.5rem; display: grid; gap: 1.5rem;">
            <div>
                <h1 style="margin: 0; font-size: clamp(2rem, 3vw, 2.75rem);">{{ $galleryItem->title }}</h1>
                <p style="margin: 0.35rem 0 0; color: #475569;">{{ $galleryItem->caption }}</p>
            </div>
            <div style="display: flex; gap: 2rem; flex-wrap: wrap; color: #1f2937;">
                <span>📍 {{ $galleryItem->location }}</span>
                <span>📅 {{ $galleryItem->captured_at?->translatedFormat('d F Y') }}</span>
                @if ($galleryItem->tourPackage)
                    <span>🧭 Bagian dari paket <a href="{{ route('packages.show', $galleryItem->tourPackage) }}" style="color: #2563eb; text-decoration: none;">{{ $galleryItem->tourPackage->title }}</a></span>
                @endif
            </div>
        </div>
    </article>

    @if ($relatedItems->isNotEmpty())
        <section style="margin-top: 3.5rem;">
            <h2 class="section-title">Momen Lainnya</h2>
            <div class="grid grid-3">
                @foreach ($relatedItems as $item)
                    <article class="card" style="padding: 0; overflow: hidden;">
                        <a href="{{ route('gallery.show', $item) }}" style="display: block;">
                            <img src="{{ $item->image_url }}" alt="{{ $item->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                        </a>
                        <div style="padding: 1.5rem; display: grid; gap: 0.6rem;">
                            <h3 style="margin: 0; font-size: 1.1rem;">
                                <a href="{{ route('gallery.show', $item) }}" style="text-decoration: none; color: inherit;">
                                    {{ $item->title }}
                                </a>
                            </h3>
                            <p style="margin: 0; color: #475569;">{{ $item->caption }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif
@endsection
