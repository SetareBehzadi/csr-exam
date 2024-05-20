<?php

namespace Database\Factories;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Guest::class;
    public function definition(): array
    {
        return [
            'user_id' => User::first() ?? User::factory(),
            'mobile_number' => $this->faker->phoneNumber(),
            'loyalty' =>  $this->faker->randomNumber(1,100),
            'birthdate' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'preferences' => json_encode([
                $this->faker->word,
                $this->faker->sentence(2)
            ]),


        ];
    }
}
