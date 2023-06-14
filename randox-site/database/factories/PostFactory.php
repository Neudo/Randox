<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));
        $rand = rand(12, 17);
        $bigRand = rand(147, 316);
        $title = $this->faker->words(5, true);
        return [
            'title' => $title,
            'slug' => $title,
            'short_desc' => $this->faker->words($rand, true),
            'content' => $this->faker->words($bigRand, true),
            'image' =>   $faker->imageUrl($width = 800, $height= 350, ['food']),
            'publied' => $this->faker->boolean(),
            'author' => $this->faker->name(),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */

}
