@extends('layouts.app')

@section('title', 'Testimoni Traveler Jayatour')

@section('content')
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a><span>›</span>Testimoni
    </div>

    <header style="margin-bottom: 2.5rem;">
        <h1 class="section-title">Cerita Keberangkatan</h1>
        <p class="section-subtitle" style="margin-bottom: 0;">Pengalaman traveler korporat, komunitas, dan keluarga bersama Jayatour.</p>
    </header>

    <div class="grid grid-2">
        @foreach ($testimonials as $testimonial)
            <article class="card" style="box-shadow: none; border: 1px solid #e2e8f0;">
                <div style="display: flex; gap: 0.75rem; align-items: center; margin-bottom: 1rem;">
                    <div style="width: 44px; height: 44px; border-radius: 50%; background: linear-gradient(135deg, #38bdf8, #2563eb); color: white; display: grid; place-items: center; font-weight: 600;">
                        {{ strtoupper(substr($testimonial->traveler_name, 0, 1)) }}
                    </div>
                    <div>
                        <strong>{{ $testimonial->traveler_name }}</strong>
                        <p style="margin: 0; color: #64748b; font-size: 0.9rem;">{{ $testimonial->traveler_location }}</p>
                    </div>
                </div>
                <p style="color: #0f172a; line-height: 1.6;">“{{ $testimonial->body }}”</p>
                <p style="margin-top: 1rem; font-size: 0.85rem; color: #475569;">
                    {{ $testimonial->traveled_at?->translatedFormat('F Y') }}
                    @if ($testimonial->tourPackage)
                        • {{ $testimonial->tourPackage->title }}
                    @endif
                </p>
            </article>
        @endforeach
    </div>

    {{ $testimonials->links('partials.pagination') }}
@endsection
