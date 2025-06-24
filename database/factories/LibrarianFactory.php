<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LibrarianFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
