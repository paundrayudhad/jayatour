@extends('layouts.app')

@section('title', $article->title . ' — Blog Jayatour')

@section('content')
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a><span>›</span>
        <a href="{{ route('blog.index') }}">Blog</a><span>›</span>
        {{ $article->title }}
    </div>

    <article class="card" style="display: grid; gap: 1.75rem; padding: 2.5rem;">
        <header style="display: grid; gap: 0.75rem;">
            <span class="badge">{{ optional($article->published_at)->translatedFormat('d F Y') }}</span>
            <h1 style="font-size: clamp(2rem, 3vw, 2.75rem); margin: 0;">{{ $article->title }}</h1>
            <p style="color: #475569; margin: 0;">{{ $article->excerpt }}</p>
        </header>

        @if ($article->cover_image)
            <img src="{{ $article->cover_image }}" alt="{{ $article->title }}" style="width: 100%; border-radius: 16px; object-fit: cover; max-height: 460px;">
        @endif

        <div style="line-height: 1.8; color: #1f2937;">
            {!! $article->content !!}
        </div>
    </article>

    @if ($latestArticles->isNotEmpty())
        <aside style="margin-top: 3rem;">
            <h2 class="section-title">Artikel Lainnya</h2>
            <div class="grid grid-3">
                @foreach ($latestArticles as $latest)
                    <article class="card" style="display: grid; gap: 0.75rem;">
                        <span class="badge">{{ optional($latest->published_at)->translatedFormat('d F Y') }}</span>
                        <h3 style="margin: 0; font-size: 1.1rem;">
                            <a href="{{ route('blog.show', $latest) }}" style="text-decoration: none; color: inherit;">
                                {{ $latest->title }}
                            </a>
                        </h3>
                        <p style="margin: 0; color: #475569;">{{ $latest->excerpt }}</p>
                    </article>
                @endforeach
            </div>
        </aside>
    @endif
@endsection
