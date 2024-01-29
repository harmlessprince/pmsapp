<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $comany =  $this->faker->company();
        return [
            'name' => $comany,
            'display_name' => $comany,
            'phone_number' => $this->faker->phoneNumber(),
            'maximum_number_of_tags' => $this->faker->randomDigit(),
            'status' => $this->faker->boolean(80),
            'created_by' => 1,
            'industry_id' => rand(1, 13),
            'state_id' => rand(2955, 2991),
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
        ];
    }
}
