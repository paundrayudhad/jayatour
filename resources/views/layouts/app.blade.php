<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            color-scheme: light;
        }
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
        }
        a {
            color: inherit;
        }
        .app-wrapper {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        header {
            background: linear-gradient(135deg, #1d4ed8, #0f172a);
            color: #f8fafc;
            padding: 1.25rem 0;
        }
        .container {
            width: min(1200px, 92vw);
            margin: 0 auto;
        }
        nav ul {
            list-style: none;
            display: flex;
            gap: 1.5rem;
            padding: 0;
            margin: 0;
            flex-wrap: wrap;
            align-items: center;
        }
        nav a {
            color: #f8fafc;
            text-decoration: none;
            font-weight: 500;
            opacity: 0.85;
        }
        nav a:hover,
        nav a[aria-current="page"] {
            opacity: 1;
        }
        main {
            flex: 1 1 auto;
            padding: 3rem 0;
        }
        footer {
            background-color: #0f172a;
            color: rgba(248, 250, 252, 0.8);
            padding: 2rem 0;
            font-size: 0.95rem;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.85rem 1.5rem;
            border-radius: 999px;
            border: none;
            font-weight: 600;
            text-decoration: none;
            background: linear-gradient(135deg, #38bdf8, #2563eb);
            color: #0f172a;
            box-shadow: 0 20px 35px rgba(37, 99, 235, 0.15);
        }
        .section-title {
            font-size: clamp(1.75rem, 2.5vw, 2.5rem);
            margin-bottom: 0.75rem;
        }
        .section-subtitle {
            font-size: 1rem;
            color: #475569;
            margin-bottom: 2.5rem;
        }
        .grid {
            display: grid;
            gap: 1.75rem;
        }
        .grid-3 {
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        }
        .grid-2 {
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        }
        .card {
            background: white;
            border-radius: 18px;
            padding: 1.75rem;
            box-shadow: 0 12px 25px rgba(15, 23, 42, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 35px rgba(15, 23, 42, 0.12);
        }
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.4rem 0.75rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 600;
            background: rgba(37, 99, 235, 0.1);
            color: #1d4ed8;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }
        .hero {
            display: grid;
            gap: 2rem;
            align-items: center;
            padding: 3rem 0;
        }
        .hero h1 {
            font-size: clamp(2.5rem, 4vw, 3.5rem);
            margin-bottom: 1rem;
        }
        .hero p {
            color: rgba(248, 250, 252, 0.85);
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 1.75rem;
        }
        .hero-card {
            background: rgba(15, 23, 42, 0.45);
            border-radius: 24px;
            padding: 2.5rem;
            color: #f8fafc;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08);
        }
        .chip-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        .chip {
            background: rgba(15, 23, 42, 0.08);
            color: #0f172a;
            padding: 0.35rem 0.85rem;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table tr + tr {
            border-top: 1px solid #e2e8f0;
        }
        table td, table th {
            text-align: left;
            padding: 0.85rem 0;
        }
        .breadcrumb {
            font-size: 0.9rem;
            color: #475569;
            margin-bottom: 1.25rem;
        }
        .breadcrumb a {
            color: #2563eb;
            text-decoration: none;
        }
        .breadcrumb span {
            margin: 0 0.4rem;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="app-wrapper">
        <header>
            <div class="container">
                <div style="display: flex; justify-content: space-between; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
                    <div>
                        <a href="{{ route('home') }}" style="color: inherit; text-decoration: none;">
                            <strong style="font-size: 1.5rem; letter-spacing: -0.02em;">Jayatour</strong>
                        </a>
                        <p style="margin: 0.25rem 0 0; opacity: 0.85;">Travel Management &amp; Experience Curator</p>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="{{ route('home') }}" aria-current="{{ request()->routeIs('home') ? 'page' : null }}">Beranda</a></li>
                            <li><a href="{{ route('packages.index') }}" aria-current="{{ request()->routeIs('packages.*') ? 'page' : null }}">Paket Tour</a></li>
                            <li><a href="{{ route('blog.index') }}" aria-current="{{ request()->routeIs('blog.*') ? 'page' : null }}">Blog</a></li>
                            <li><a href="{{ route('gallery.index') }}" aria-current="{{ request()->routeIs('gallery.*') ? 'page' : null }}">Galeri</a></li>
                            <li><a href="{{ route('testimonials.index') }}" aria-current="{{ request()->routeIs('testimonials.*') ? 'page' : null }}">Testimoni</a></li>
                            <li><a href="{{ route('contact') }}" aria-current="{{ request()->routeIs('contact') ? 'page' : null }}">Kontak</a></li>
                            <li><a class="btn" style="padding: 0.6rem 1.2rem; color: #0f172a;" href="{{ url('/admin') }}">Admin</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>

        <footer>
            <div class="container" style="display: grid; gap: 1.5rem;">
                <div>
                    <strong style="font-size: 1.25rem;">Jayatour</strong>
                    <p style="margin: 0.5rem 0 0; max-width: 620px; line-height: 1.6;">
                        Kami membantu perusahaan, komunitas, dan keluarga untuk merancang perjalanan yang penuh makna,
                        mulai dari perencanaan itinerary hingga manajemen perjalanan end-to-end.
                    </p>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 1.5rem; align-items: center; justify-content: space-between;">
                    <span>&copy; {{ now()->year }} Jayatour. All rights reserved.</span>
                    <span>Hubungi kami di <a href="mailto:hello@jayatour.id" style="color: #38bdf8;">hello@jayatour.id</a></span>
                </div>
            </div>
        </footer>
    </div>

    @stack('scripts')
</body>
</html>
