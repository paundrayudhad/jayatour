@extends('layouts.app')

@section('title', 'Paket Tour Jayatour')

@section('content')
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a><span>›</span>Paket Tour
    </div>

    <div style="display: grid; gap: 2rem;">
        <header style="display: grid; gap: 1.5rem;">
            <div>
                <h1 class="section-title" style="margin-bottom: 0.5rem;">Temukan Paket Perjalanan</h1>
                <p class="section-subtitle" style="margin-bottom: 0;">
                    Filter berdasarkan kategori destinasi atau cari itinerary yang sesuai dengan kebutuhan tim dan keluarga Anda.
                </p>
            </div>
            <form method="GET" style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: center;">
                <select name="category" style="padding: 0.8rem 1rem; border-radius: 12px; border: 1px solid #cbd5f5; font-size: 1rem;">
                    <option value="">Semua kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}" @selected(request('category') === $category->slug)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari destinasi, lokasi, atau highlights"
                    style="flex: 1 1 280px; padding: 0.8rem 1rem; border-radius: 12px; border: 1px solid #cbd5f5; font-size: 1rem;">
                <button type="submit" class="btn" style="padding: 0.8rem 1.6rem;">Terapkan</button>
                @if(request()->hasAny(['category', 'q']))
                    <a href="{{ route('packages.index') }}" class="btn" style="padding: 0.8rem 1.6rem; background: #e2e8f0; color: #0f172a; box-shadow: none;">Reset</a>
                @endif
            </form>
        </header>

        <div class="grid grid-3">
            @foreach ($packages as $package)
                <article class="card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                    @if ($package->hero_image)
                        <img src="{{ $package->hero_image }}" alt="{{ $package->title }}"
                             style="width: 100%; height: 180px; object-fit: cover;">
                    @endif
                    <div style="padding: 1.5rem; display: grid; gap: 0.75rem; flex: 1;">
                        <div style="display: flex; justify-content: space-between; align-items: center; gap: 1rem;">
                            <span class="badge">{{ $package->category?->name }}</span>
                            <span style="font-weight: 600; color: #2563eb;">{{ $package->price_label }}</span>
                        </div>
                        <h2 style="font-size: 1.25rem; margin: 0;">
                            <a href="{{ route('packages.show', $package) }}" style="color: inherit; text-decoration: none;">
                                {{ $package->title }}
                            </a>
                        </h2>
                        <p style="margin: 0; color: #475569;">{{ $package->excerpt }}</p>
                        <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; color: #1f2937; font-size: 0.95rem;">
                            <span>📍 {{ $package->location }}</span>
                            @if ($package->duration)
                                <span>🕒 {{ $package->duration }}</span>
                            @endif
                            @if ($package->difficulty)
                                <span>⭐ {{ $package->difficulty }}</span>
                            @endif
                        </div>
                        <div style="margin-top: auto;">
                            <a href="{{ route('packages.show', $package) }}" class="btn" style="padding: 0.65rem 1.4rem;">Detail Paket</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        {{ $packages->links('partials.pagination') }}
    </div>
@endsection
