<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'teacher_name' => fake()->name(),
            'teacher_email' => fake()->unique()->safeEmail(),
            'teacher_mobile_number' => fake()->e164PhoneNumber(),
            'teacher_gender' => rand(1,2),
        ];
    }
}
