<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->realText(100),
            'points' => $this->faker->numerify('#'),
            'type' => 'radio',
            'is_correct' => false,
            'question_id' => 1,
        ];
    }

    public function option($text, $type, $isCorrect, $question)
    {
        return $this->state([
            'text' => $text,
            'points' => 1,
            'type' => $type,
            'is_correct' => $isCorrect,
            'question_id' => $question,
        ]);
    }
}
