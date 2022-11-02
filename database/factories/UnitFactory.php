<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UnitFactory extends Factory
{
    protected $model = Unit::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
//        return [
//            'programme' => $this->faker->word(),
//            'unit' => $this->faker->numberBetween(1111,5555),
//            'description' => $this->faker->sentence(5),
//        ];
    }
}
