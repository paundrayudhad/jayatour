<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\DestinationCategory;
use App\Models\GalleryItem;
use App\Models\Testimonial;
use App\Models\TourPackage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminEmail = 'admin@jayatour.id';

        User::factory()->create([
            'name' => 'Jayatour Admin',
            'email' => $adminEmail,
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        $categories = collect([
            [
                'name' => 'Paket Domestik',
                'slug' => 'paket-domestik',
                'tagline' => 'Eksplor pesona Nusantara',
                'description' => 'Temukan pengalaman terbaik menjelajah destinasi wisata domestik bersama Jayatour.',
            ],
            [
                'name' => 'Paket Internasional',
                'slug' => 'paket-internasional',
                'tagline' => 'Jelajahi dunia tanpa repot',
                'description' => 'Pilihan perjalanan internasional favorit dengan itinerary yang fleksibel.',
            ],
            [
                'name' => 'Paket Bundling',
                'slug' => 'paket-bundling',
                'tagline' => 'Liburan hemat untuk keluarga dan komunitas',
                'description' => 'Gabungan perjalanan, akomodasi, dan aktivitas seru dalam satu paket bundling.',
            ],
        ])->map(fn (array $preset) => DestinationCategory::factory()->state($preset)->create());

        $packages = TourPackage::factory()
            ->count(12)
            ->recycle($categories)
            ->create();

        Article::factory()->count(6)->create();

        Testimonial::factory()
            ->count(10)
            ->recycle($packages)
            ->create();

        GalleryItem::factory()
            ->count(12)
            ->recycle($packages)
            ->create();
    }
}
