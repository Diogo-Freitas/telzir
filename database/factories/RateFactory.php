<?php

namespace Database\Factories;

use App\Models\DirectDistanceDialing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rate>
 */
class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'source_code_id' => DirectDistanceDialing::factory(),
            'destination_code_id' => DirectDistanceDialing::factory(),
            'value' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0.5, $max = 2),
        ];
    }
}
