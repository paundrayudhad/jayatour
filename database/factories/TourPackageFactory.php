<?php

namespace Database\Factories;

use App\Models\DestinationCategory;
use App\Models\TourPackage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<TourPackage>
 */
class TourPackageFactory extends Factory
{
    protected $model = TourPackage::class;

    public function definition(): array
    {
        $title = fake()->unique()->city() . ' Adventure';

        return [
            'destination_category_id' => DestinationCategory::factory(),
            'title' => $title,
            'slug' => Str::slug($title . '-' . fake()->unique()->numberBetween(1, 9999)),
            'hero_image' => fake()->imageUrl(1200, 800, 'travel', true),
            'location' => fake()->city() . ', ' . fake()->country(),
            'duration' => fake()->numberBetween(3, 10) . ' hari',
            'price_label' => 'Mulai ' . fake()->randomElement(['IDR', 'USD']) . ' ' . fake()->numberBetween(5, 15) * 1000000,
            'difficulty' => fake()->randomElement(['Santai', 'Petualangan', 'Keluarga']),
            'excerpt' => fake()->sentences(2, true),
            'itinerary' => collect(range(1, fake()->numberBetween(3, 6)))->map(function ($day) {
                return "Hari {$day}: " . fake()->sentence(12);
            })->implode("\n"),
            'is_featured' => fake()->boolean(30),
            'highlights' => collect(range(1, fake()->numberBetween(3, 5)))->map(fn () => fake()->sentence())->values()->all(),
        ];
    }
}
