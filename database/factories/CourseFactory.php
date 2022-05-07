<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $courses = ['Java', 'Python', 'Javascript', 'Php'];
        return [
            'name' => $this->faker->randomElement($courses),
            'description' => $this->faker->realText(200),
        ];
    }

    /**
     * @param string $name
     * @param string $desc
     * @return static
     */
    public function course(string $name, string $desc)
    {

        return $this->state([
            'name' => $name,
            'description' => $desc,
        ]);
    }

    public function python()
    {
        return $this->state([
            'name' => 'python',
            'description' => 'Python pamatu apmācības kurss',
        ]);
    }
}
