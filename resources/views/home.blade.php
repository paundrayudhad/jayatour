@extends('layouts.app')

@section('title', 'Jayatour — Travel Management & Experience Curator')

@section('content')
    <section class="hero-card">
        <div class="badge">Jayatour Experience</div>
        <h1>Perjalanan yang dirancang khusus untuk setiap momen penting Anda.</h1>
        <p>
            Jayatour menghadirkan solusi perjalanan menyeluruh untuk corporate outing, family trip,
            hingga umrah dan private tour. Tim konsultan kami memastikan itinerary, akomodasi, dan
            pengalaman terbaik sesuai kebutuhan Anda.
        </p>
        <div class="chip-list" style="margin-bottom: 2rem;">
            <span class="chip">Corporate Travel</span>
            <span class="chip">Family Holiday</span>
            <span class="chip">Group Series</span>
            <span class="chip">Private Tour</span>
            <span class="chip">Religious Journey</span>
        </div>
        <a href="{{ route('packages.index') }}" class="btn">Lihat Paket Unggulan</a>
    </section>

    <section style="margin-top: 4rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap;">
            <div>
                <h2 class="section-title">Kategori Destinasi</h2>
                <p class="section-subtitle">Pilih fokus perjalanan Anda dan jelajahi itinerary yang siap diadaptasi.</p>
            </div>
            <a href="{{ route('packages.index') }}" class="btn" style="padding: 0.7rem 1.3rem;">Semua Paket</a>
        </div>
        <div class="grid grid-3">
            @foreach ($categories as $category)
                <article class="card">
                    <div class="badge">{{ $category->tour_packages_count }} Paket</div>
                    <h3 style="font-size: 1.4rem; margin-top: 0.75rem;">{{ $category->name }}</h3>
                    <p style="color: #475569; line-height: 1.6;">{{ $category->description }}</p>
                    <p style="margin-top: 1.25rem; font-weight: 600; color: #2563eb;">{{ $category->tagline }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section style="margin-top: 5rem;">
        <h2 class="section-title">Paket Unggulan</h2>
        <p class="section-subtitle">Paket pilihan dengan ketersediaan terbatas dan pengalaman yang tak terlupakan.</p>
        <div class="grid grid-3">
            @foreach ($featuredPackages as $package)
                <article class="card" style="padding: 0; overflow: hidden;">
                    @if ($package->hero_image)
                        <img src="{{ $package->hero_image }}" alt="{{ $package->title }}"
                            style="width: 100%; height: 180px; object-fit: cover;">
                    @endif
                    <div style="padding: 1.5rem; display: grid; gap: 0.75rem;">
                        <span class="badge">{{ $package->category?->name }}</span>
                        <h3 style="font-size: 1.3rem; margin: 0;">{{ $package->title }}</h3>
                        <p style="margin: 0; color: #475569;">{{ $package->excerpt }}</p>
                        <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; font-size: 0.95rem; color: #1e293b;">
                            <span>📍 {{ $package->location }}</span>
                            <span>🕒 {{ $package->duration }}</span>
                            <span>💰 {{ $package->price_label }}</span>
                        </div>
                        <a href="{{ route('packages.show', $package) }}" class="btn" style="width: fit-content;">Lihat Detail</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section style="margin-top: 5rem;">
        <h2 class="section-title">Cerita Perjalanan</h2>
        <p class="section-subtitle">Insight, tips, dan pengalaman terbaru dari tim travel consultant kami.</p>
        <div class="grid grid-3">
            @foreach ($latestArticles as $article)
                <article class="card">
                    <span class="badge">{{ optional($article->published_at)->translatedFormat('d F Y') }}</span>
                    <h3 style="font-size: 1.2rem; margin: 0.75rem 0 0.5rem;">
                        <a href="{{ route('blog.show', $article) }}" style="text-decoration: none; color: inherit;">
                            {{ $article->title }}
                        </a>
                    </h3>
                    <p style="color: #475569; line-height: 1.6;">{{ $article->excerpt }}</p>
                    <a href="{{ route('blog.show', $article) }}" style="color: #2563eb; font-weight: 600; text-decoration: none;">Baca selengkapnya →</a>
                </article>
            @endforeach
        </div>
    </section>

    <section style="margin-top: 5rem; background: white; border-radius: 20px; padding: 2.5rem; box-shadow: 0 12px 25px rgba(15, 23, 42, 0.06);">
        <div style="display: grid; gap: 2.5rem;">
            <div>
                <h2 class="section-title">Apa kata traveler kami?</h2>
                <p class="section-subtitle" style="margin-bottom: 1.5rem;">Testimoni nyata dari klien korporat dan keluarga yang mempercayakan perjalanannya kepada Jayatour.</p>
            </div>
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
                            {{ $testimonial->traveled_at?->translatedFormat('F Y') }} • {{ $testimonial->tourPackage?->title }}
                        </p>
                    </article>
                @endforeach
            </div>
            <a href="{{ route('testimonials.index') }}" class="btn" style="width: fit-content;">Lihat semua testimoni</a>
        </div>
    </section>

    <section style="margin-top: 5rem; display: grid; gap: 2rem;">
        <div class="card" style="background: linear-gradient(135deg, rgba(56, 189, 248, 0.18), rgba(37, 99, 235, 0.18)); border: 1px solid rgba(37, 99, 235, 0.35);">
            <h2 class="section-title" style="margin-bottom: 1rem;">Siap rancang perjalanan Anda?</h2>
            <p style="color: #1e293b; line-height: 1.6; max-width: 720px;">
                Tim travel consultant kami siap membantu Anda membuat itinerary yang fleksibel, menghitung estimasi biaya,
                dan memberikan rekomendasi aktivitas terbaik sesuai kebutuhan tim atau keluarga Anda.
            </p>
            <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 1.5rem;">
                <a href="mailto:hello@jayatour.id" class="btn">Konsultasi Gratis</a>
                <a href="https://wa.me/6281234567890" class="btn" style="background: linear-gradient(135deg, #22c55e, #16a34a); color: #f8fafc;">Chat via WhatsApp</a>
            </div>
        </div>
    </section>
@endsection
