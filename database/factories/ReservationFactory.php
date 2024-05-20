<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Reservation::class;
    public function definition(): array
    {
        return [
            'user_id' => User::first() ?? User::factory(),
            'room_id' => Room::first() ?? Room::factory(),
            'check_in' => $this->faker->dateTimeBetween('+1 months','+12 months'),
            'check_out' => $this->faker->dateTimeBetween('+1 months','+12 months'),
            'tax' => 10000,
            'total_price' => 90000000,
            'final_price' => 90000000 + 10000,
        ];
    }
}
