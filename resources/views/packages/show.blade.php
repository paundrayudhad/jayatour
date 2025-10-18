@extends('layouts.app')

@section('title', $tourPackage->title . ' — Paket Jayatour')

@section('content')
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a><span>›</span>
        <a href="{{ route('packages.index') }}">Paket Tour</a><span>›</span>
        {{ $tourPackage->title }}
    </div>

    <article class="card" style="padding: 0; overflow: hidden;">
        @if ($tourPackage->hero_image)
            <img src="{{ $tourPackage->hero_image }}" alt="{{ $tourPackage->title }}"
                style="width: 100%; max-height: 360px; object-fit: cover;">
        @endif
        <div style="padding: 2.5rem; display: grid; gap: 1.75rem;">
            <div style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: center; justify-content: space-between;">
                <div>
                    <span class="badge">{{ $tourPackage->category?->name }}</span>
                    <h1 style="font-size: clamp(2rem, 3vw, 2.75rem); margin: 1rem 0 0.5rem;">{{ $tourPackage->title }}</h1>
                    <p style="margin: 0; color: #475569;">{{ $tourPackage->excerpt }}</p>
                </div>
                <div style="text-align: right;">
                    <p style="margin: 0; font-size: 0.9rem; color: #64748b;">Mulai dari</p>
                    <p style="margin: 0; font-size: 1.75rem; font-weight: 700; color: #2563eb;">{{ $tourPackage->price_label }}</p>
                </div>
            </div>

            <div style="display: grid; gap: 1rem; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
                <div class="card" style="box-shadow: none; border: 1px solid #e2e8f0;">
                    <strong>Durasi</strong>
                    <p style="margin: 0.35rem 0 0; color: #1f2937;">{{ $tourPackage->duration ?? 'Flexible' }}</p>
                </div>
                <div class="card" style="box-shadow: none; border: 1px solid #e2e8f0;">
                    <strong>Lokasi</strong>
                    <p style="margin: 0.35rem 0 0; color: #1f2937;">{{ $tourPackage->location }}</p>
                </div>
                <div class="card" style="box-shadow: none; border: 1px solid #e2e8f0;">
                    <strong>Tingkat Aktivitas</strong>
                    <p style="margin: 0.35rem 0 0; color: #1f2937;">{{ $tourPackage->difficulty ?? 'All Levels' }}</p>
                </div>
            </div>

            @if (!empty($tourPackage->highlights))
                <div>
                    <h2 style="font-size: 1.5rem; margin-bottom: 1rem;">Highlight Perjalanan</h2>
                    <div class="chip-list">
                        @foreach ($tourPackage->highlights as $highlight)
                            <span class="chip">{{ $highlight }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($tourPackage->itinerary)
                <div>
                    <h2 style="font-size: 1.5rem; margin-bottom: 1rem;">Rundown Itinerary</h2>
                    <div style="display: grid; gap: 1rem;">
                        @foreach (explode("\n", $tourPackage->itinerary) as $line)
                            <div class="card" style="box-shadow: none; border: 1px solid #e2e8f0;">
                                {{ trim($line) }}
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($tourPackage->testimonials->isNotEmpty())
                <section style="display: grid; gap: 1.5rem;">
                    <h2 style="font-size: 1.5rem;">Cerita Traveler</h2>
                    <div class="grid grid-2">
                        @foreach ($tourPackage->testimonials as $testimonial)
                            <article class="card" style="box-shadow: none; border: 1px solid #e2e8f0;">
                                <strong>{{ $testimonial->traveler_name }}</strong>
                                <p style="margin: 0.25rem 0 0.75rem; color: #64748b; font-size: 0.9rem;">
                                    {{ $testimonial->traveler_location }} • {{ $testimonial->traveled_at?->translatedFormat('F Y') }}
                                </p>
                                <p style="color: #0f172a; line-height: 1.6;">“{{ $testimonial->body }}”</p>
                            </article>
                        @endforeach
                    </div>
                </section>
            @endif

            <section style="display: grid; gap: 1.5rem;">
                <h2 style="font-size: 1.5rem;">Mulai konsultasi perjalanan</h2>
                <p style="color: #475569; max-width: 720px;">Sampaikan preferensi destinasi, jumlah peserta, dan jadwal yang Anda inginkan. Tim kami akan mengirimkan proposal penawaran dalam 1x24 jam kerja.</p>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="mailto:hello@jayatour.id" class="btn">Kirim Briefing</a>
                    <a href="https://wa.me/6281234567890" class="btn" style="background: linear-gradient(135deg, #22c55e, #16a34a); color: #f8fafc;">Chat Konsultan</a>
                </div>
            </section>
        </div>
    </article>

    @if ($relatedPackages->isNotEmpty())
        <section style="margin-top: 4rem;">
            <h2 class="section-title">Paket Terkait</h2>
            <div class="grid grid-3">
                @foreach ($relatedPackages as $related)
                    <article class="card" style="display: grid; gap: 0.75rem;">
                        <span class="badge">{{ $related->category?->name }}</span>
                        <h3 style="margin: 0;">
                            <a href="{{ route('packages.show', $related) }}" style="text-decoration: none; color: inherit;">
                                {{ $related->title }}
                            </a>
                        </h3>
                        <p style="margin: 0; color: #475569;">{{ $related->excerpt }}</p>
                        <p style="margin: 0; font-weight: 600; color: #2563eb;">{{ $related->price_label }}</p>
                    </article>
                @endforeach
            </div>
        </section>
    @endif
@endsection
