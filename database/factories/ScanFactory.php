<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scan>
 */
class ScanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $scan_date_time  = $this->faker->dateTime();

        return [
            "latitude" => $this->faker->latitude(),
            "longitude" => $this->faker->longitude(),
        ];
    }
}
