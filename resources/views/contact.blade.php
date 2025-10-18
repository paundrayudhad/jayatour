@extends('layouts.app')

@section('title', 'Kontak Jayatour')

@section('content')
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a><span>›</span>Kontak
    </div>

    <section class="card" style="display: grid; gap: 2rem; padding: 2.5rem;">
        <header>
            <h1 class="section-title" style="margin-bottom: 0.75rem;">Hubungi Tim Jayatour</h1>
            <p style="color: #475569; margin: 0; line-height: 1.6;">
                Rencanakan perjalanan perusahaan, komunitas, atau keluarga Anda bersama konsultan Jayatour.
                Kami siap membantu dari tahap brainstorming hingga keberangkatan.
            </p>
        </header>

        <div style="display: grid; gap: 1.5rem; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));">
            <article class="card" style="box-shadow: none; border: 1px solid #e2e8f0;">
                <h2 style="margin-top: 0;">Kantor Pusat</h2>
                <p style="margin: 0; color: #475569;">
                    Jl. Jayatour No. 88, Surabaya<br>
                    Senin–Jumat 09.00 – 17.00 WIB
                </p>
            </article>

            <article class="card" style="box-shadow: none; border: 1px solid #e2e8f0;">
                <h2 style="margin-top: 0;">Konsultasi Cepat</h2>
                <p style="margin: 0; color: #475569;">Email: <a href="mailto:hello@jayatour.id" style="color: #2563eb; text-decoration: none;">hello@jayatour.id</a></p>
                <p style="margin: 0.35rem 0 0; color: #475569;">WhatsApp: <a href="https://wa.me/6281234567890" style="color: #22c55e; text-decoration: none;">+62 812-3456-7890</a></p>
            </article>

            <article class="card" style="box-shadow: none; border: 1px solid #e2e8f0;">
                <h2 style="margin-top: 0;">Layanan Corporate</h2>
                <p style="margin: 0; color: #475569;">Email: <a href="mailto:corporate@jayatour.id" style="color: #2563eb; text-decoration: none;">corporate@jayatour.id</a></p>
                <p style="margin: 0.35rem 0 0; color: #475569;">Telepon: (031) 9988 7766</p>
            </article>
        </div>

        <div style="background: linear-gradient(135deg, rgba(37, 99, 235, 0.1), rgba(56, 189, 248, 0.15)); border-radius: 18px; padding: 2rem;">
            <h2 style="margin-top: 0;">Request Proposal</h2>
            <p style="color: #1f2937; max-width: 640px;">Kirimkan detail kebutuhan perjalanan Anda melalui email <a href="mailto:proposal@jayatour.id" style="color: #2563eb;">proposal@jayatour.id</a>. Sertakan jumlah peserta, destinasi, waktu keberangkatan, dan preferensi aktivitas.</p>
        </div>
    </section>
@endsection
