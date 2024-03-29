<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'salary' => strval(fake()->randomFloat(2, 50000, 100000)),
            // Foreign
            'employer_id' => Employer::factory(),
            // M2M relationship create
            // 'tags' => Tag::factory()->count(3)
        ];
    }
}
