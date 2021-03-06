<?php

namespace Database\Factories;

use Illuminate\{
    Database\Eloquent\Factories\Factory,
    Support\Facades\Hash,
    Support\Str,
};

class UserFactory extends Factory
{
    public function definition ()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'type_id' => 1,
            'group_id' => 1,
            'grade' => 10,
        ];
    }

    public function testUser ()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('parole'), // password
                'remember_token' => Str::random(10),
                'type_id' => 1,
                'group_id' => 1,
            ];
        });
    }

    /**
     * @param int $type
     * @param int $group
     * @return static
     */
    public function user(int $type, int $group)
    {
        return $this->state([
            'type_id' => $type,
            'group_id' => $group,
            'grade' => 10,
        ]);
    }

}
