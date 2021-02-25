<?php

namespace Database\Factories;

use App\Models\mark;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = mark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mark' => $this->faker->numberBetween($min = 0, $max = 20),
            'student_id' => $this->faker->numberBetween($min = 1, $max = 100),
            'course_id' => $this->faker->numberBetween($min = 1, $max = 40)
        ];
    }
}
