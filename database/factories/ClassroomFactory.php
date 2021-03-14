<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClassroomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classroom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Classe ' . $this->faker->unique()->numberBetween($min = 1, $max = 10),
            'promotion_date' => $this->faker->numberBetween($min = 2020, $max = 2026),
        ];
    }
}
