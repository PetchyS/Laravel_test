<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// use app\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'gender'=> $this->faker->numberBetween(1,2),
            'status' => $this->faker->boolean, 
        ];
    }
}
