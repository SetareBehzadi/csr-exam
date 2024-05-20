<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Room::class;
    public function definition(): array
    {
        $roomTypes = [
             'single' =>1,
            'double' =>2,
             'triple' =>3,
             'quadruple' =>4,
             'others' =>5
        ];
        $type = $this->faker->randomElement(['single', 'double', 'triple', 'quadruple', 'others']);
        $count = $roomTypes[$type];
        return [
            'type' => $type,
            'count' => $count,
            'price' => $this->faker->numberBetween(1000, 10000),
            'amenities' => json_encode(['wifi', 'tv', 'ac']),
        ];
    }
}
