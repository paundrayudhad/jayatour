<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            color-scheme: light dark;
        }
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            display: grid;
            min-height: 100vh;
            place-items: center;
            background: linear-gradient(135deg, #0f172a, #1d4ed8);
            color: #f8fafc;
        }
        .card {
            background: rgba(15, 23, 42, 0.85);
            border-radius: 24px;
            padding: 3rem;
            max-width: 640px;
            text-align: center;
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.45);
        }
        h1 {
            margin: 0 0 1rem;
            font-size: 2.75rem;
            letter-spacing: -1px;
        }
        p {
            margin: 0 0 2rem;
            line-height: 1.7;
            color: rgba(226, 232, 240, 0.85);
        }
        a.button {
            display: inline-block;
            padding: 0.85rem 1.75rem;
            border-radius: 999px;
            background: #38bdf8;
            color: #0f172a;
            font-weight: 600;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 12px 30px rgba(56, 189, 248, 0.25);
        }
        a.button:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 38px rgba(56, 189, 248, 0.35);
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Welcome to {{ config('app.name') }}</h1>
        <p>
            The Jayatour platform is now powered by Laravel. This landing page is rendered via a Blade template
            and serves as a starting point for rebuilding the travel experience with familiar PHP tooling.
        </p>
        <a class="button" href="{{ route('home') }}">Explore</a>
    </div>
</body>
</html>
