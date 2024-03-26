<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tag_name = 'TAG' . $this->faker->randomNumber(4, true);

        return [
            "name" =>  $tag_name,
            "latitude" => $this->faker->latitude(),
            "longitude" => $this->faker->longitude(),
            "comment" => $this->faker->sentence
        ];
    }
}
