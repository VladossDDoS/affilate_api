<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'username' => $this->faker->userName(),
            'password' => \Hash::make('password'),
            'role' => 'agent'
        ];
    }
}
