<?php

namespace Database\Factories;

use App\Models\DestinationCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<DestinationCategory>
 */
class DestinationCategoryFactory extends Factory
{
    protected $model = DestinationCategory::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);

        return [
            'name' => Str::headline($name),
            'slug' => Str::slug($name),
            'tagline' => fake()->sentence(),
            'description' => fake()->paragraph(),
        ];
    }
}
