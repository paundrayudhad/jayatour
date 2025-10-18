# Jayatour Laravel Application

Jayatour kini menggunakan aplikasi Laravel 11 penuh yang menyajikan konten dinamis untuk halaman marketing sekaligus dashboard administrasi berbasis [Filament](https://filamentphp.com/). Konten paket perjalanan, artikel blog, galeri, dan testimoni dapat dikelola dari panel admin dan otomatis ditampilkan pada situs publik.

## Getting started

1. Ensure you have PHP 8.2+, Composer, Node.js (optional for front-end tooling), and a database (MySQL or SQLite) available.
2. Install dependencies:
   ```bash
   composer install
   ```
3. Copy the environment file and generate an application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Configure your database credentials in `.env`, then run migrations and seed the starter content (admin user, paket tour, artikel, galeri, dan testimoni contoh):
   ```bash
   php artisan migrate --seed
   ```
5. Start the local development server:
   ```bash
   php artisan serve
   ```

## Konten dinamis yang tersedia

* `resources/views/home.blade.php` – beranda marketing menampilkan kategori destinasi, paket unggulan, artikel terbaru, dan testimoni.
* `resources/views/packages/*.blade.php` – listing dan detail paket tur dengan itinerary, highlight, dan paket terkait.
* `resources/views/blog/*.blade.php` – daftar artikel dan halaman detail blog.
* `resources/views/gallery/*.blade.php` – galeri foto perjalanan.
* `resources/views/testimonials/index.blade.php` – kumpulan testimoni traveler.
* `resources/views/contact.blade.php` – informasi kontak dan request proposal.

Semua data tersebut diambil dari model Eloquent (`TourPackage`, `DestinationCategory`, `Article`, `GalleryItem`, `Testimonial`) yang bisa diedit dari panel admin Filament.

## Panel admin Filament

Setelah menjalankan migrasi dan seeder, akses dashboard admin di `http://localhost:8000/admin` dan masuk menggunakan kredensial bawaan berikut:

```
Email   : admin@jayatour.id
Password: password
```

Panel memberikan resource untuk:

* Paket tour dan kategorinya.
* Artikel blog.
* Testimoni traveler.
* Item galeri foto.

Gunakan Filament untuk menambah, mengubah, atau menghapus data sehingga perubahan langsung tercermin pada sisi publik.

## Testing

Once dependencies are installed you can execute the automated test suite with:

```bash
php artisan test
```

## Pengembangan lanjutan

* Atur integrasi storage (S3, local) apabila ingin mengunggah gambar secara langsung melalui Filament.
* Tambahkan autentikasi kustom atau role tambahan dengan memanfaatkan properti `is_admin` pada model `User`.
* Sesuaikan styling Blade atau ganti dengan Inertia/Livewire sesuai kebutuhan.

## Deployment

Follow your preferred Laravel deployment strategy (Forge, Vapor, Docker, etc.). Remember to set the necessary environment variables and run migrations on the target environment.
