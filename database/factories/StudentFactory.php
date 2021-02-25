<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'age' => $this->faker->numberBetween($min = 18, $max = 30),
            'year' => $this->faker->numberBetween($min = 2016, $max = 2021),
            'classroom_id' => $this->faker->numberBetween($min = 1, $max = 10),
        ];
    }
}
