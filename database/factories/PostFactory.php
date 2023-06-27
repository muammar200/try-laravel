<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
              'title' => $this->faker->sentence(mt_rand(2,8)), //arti dari function mt_rand(2,8), yaitu kita akan men-generate kalimat dengan minimal 2 kata dan maksimal 8 kata
              'slug' => $this->faker->slug(),
              'excerpt' => $this->faker->paragraph(),
              'content' => $this->faker->paragraph(mt_rand(50,100)), 
              'user_id' => mt_rand(1,4),
              'category_id' => mt_rand(1,2),
        ];
    }
}
