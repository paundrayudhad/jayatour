<?php

namespace Database\Factories;

use App\Models\Testimonial;
use App\Models\TourPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Testimonial>
 */
class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    public function definition(): array
    {
        return [
            'tour_package_id' => TourPackage::factory(),
            'traveler_name' => fake()->name(),
            'traveler_location' => fake()->city(),
            'rating' => fake()->numberBetween(4, 5),
            'traveled_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'body' => fake()->paragraph(3),
        ];
    }
}
