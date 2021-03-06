<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->realText(100000),
            'course_id' => 1
        ];
    }

    public function question($text, $course, $theory)
    {
        return $this->state([
            'text' => $text,
            'course_id' => $course,
            'theory' => $theory
        ]);
    }
}
