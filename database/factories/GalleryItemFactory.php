<?php

namespace Database\Factories;

use App\Models\GalleryItem;
use App\Models\TourPackage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<GalleryItem>
 */
class GalleryItemFactory extends Factory
{
    protected $model = GalleryItem::class;

    public function definition(): array
    {
        $title = fake()->sentence(3);

        return [
            'tour_package_id' => TourPackage::factory(),
            'title' => Str::title($title),
            'slug' => Str::slug($title . '-' . fake()->unique()->numberBetween(1, 9999)),
            'image_url' => fake()->imageUrl(1024, 768, 'travel', true),
            'location' => fake()->city() . ', ' . fake()->country(),
            'caption' => fake()->sentence(8),
            'captured_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
