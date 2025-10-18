@extends('layouts.app')

@section('title', 'Galeri Perjalanan Jayatour')

@section('content')
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a><span>›</span>Galeri
    </div>

    <header style="margin-bottom: 2.5rem;">
        <h1 class="section-title">Momen Perjalanan</h1>
        <p class="section-subtitle" style="margin-bottom: 0;">Dokumentasi foto dan highlight aktivitas bersama para traveler Jayatour.</p>
    </header>

    <div class="grid grid-3">
        @foreach ($galleryItems as $item)
            <article class="card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                <a href="{{ route('gallery.show', $item) }}" style="display: block;">
                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" style="width: 100%; height: 220px; object-fit: cover;">
                </a>
                <div style="padding: 1.5rem; display: grid; gap: 0.5rem; flex: 1;">
                    <h2 style="margin: 0; font-size: 1.2rem;">
                        <a href="{{ route('gallery.show', $item) }}" style="text-decoration: none; color: inherit;">
                            {{ $item->title }}
                        </a>
                    </h2>
                    <p style="margin: 0; color: #475569;">{{ $item->caption }}</p>
                    <p style="margin: 0; font-size: 0.9rem; color: #64748b;">
                        {{ $item->captured_at?->translatedFormat('d F Y') }}
                        @if ($item->tourPackage)
                            • {{ $item->tourPackage->title }}
                        @endif
                    </p>
                </div>
            </article>
        @endforeach
    </div>

    {{ $galleryItems->links('partials.pagination') }}
@endsection
