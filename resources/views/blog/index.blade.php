@extends('layouts.app')

@section('title', 'Blog Jayatour')

@section('content')
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a><span>›</span>Blog
    </div>

    <header style="margin-bottom: 2.5rem;">
        <h1 class="section-title">Cerita & Wawasan Perjalanan</h1>
        <p class="section-subtitle" style="margin-bottom: 0;">Panduan memilih destinasi, tips budgeting, hingga cerita sukses pelaksanaan event perjalanan.</p>
    </header>

    <div class="grid grid-3">
        @foreach ($articles as $article)
            <article class="card" style="display: grid; gap: 0.75rem;">
                <span class="badge">{{ optional($article->published_at)->translatedFormat('d F Y') }}</span>
                <h2 style="font-size: 1.2rem; margin: 0;">
                    <a href="{{ route('blog.show', $article) }}" style="text-decoration: none; color: inherit;">
                        {{ $article->title }}
                    </a>
                </h2>
                <p style="margin: 0; color: #475569; line-height: 1.6;">{{ $article->excerpt }}</p>
                <a href="{{ route('blog.show', $article) }}" style="color: #2563eb; font-weight: 600; text-decoration: none;">
                    Baca selengkapnya →
                </a>
            </article>
        @endforeach
    </div>

    {{ $articles->links('partials.pagination') }}
@endsection
