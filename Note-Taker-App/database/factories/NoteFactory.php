<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            return [
                'title' => $this->faker->sentence,
                'user_id' => User::factory(), // Create a new user if needed
                'course_id' => Course::factory(), // Create a new course if needed
                'content' => $this->faker->sentences(10, true)
            ];
    }
}
