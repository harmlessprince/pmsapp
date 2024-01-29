<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->city(),
            "photo" => $this->faker->imageUrl,
            "address" => $this->faker->address(),
            "logout_pin" => Hash::make(1234),
            "number_of_tags" => 12,
            "maximum_number_of_rounds" => 24,
            "shift_start_time" => Carbon::createFromTime(8 )->format('H:i:s'),
            "shift_end_time" =>  Carbon::createFromTime(20 )->format('H:i:s'),
            "latitude" => $this->faker->latitude(),
            "longitude" => $this->faker->longitude(),
        ];
    }
}
