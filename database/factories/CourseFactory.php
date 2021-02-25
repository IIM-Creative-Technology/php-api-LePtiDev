<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'start' => $this->faker->dateTimeAD('2022-07-29 19:30:00', 'Europe/Paris'),
            'end' => $this->faker->dateTimeAD('2022-07-29 19:30:00', 'Europe/Paris'),
            'speaker_id' => $this->faker->numberBetween($min= 1, $max = 20),
            'classroom_id' => $this->faker->numberBetween($min= 1, $max = 10)
        ];
    }
}
