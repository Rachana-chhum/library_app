<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $borrowDate = $this->faker->dateTimeBetween('-1 month', 'now');
        $returnDate = (clone $borrowDate)->modify('+7 days');

        return [
            'book_id' => Book::inRandomOrder()->first()?->id ?? Book::factory(),
            'member_id' => Member::inRandomOrder()->first()?->id ?? Member::factory(),
            'borrow_date' => $borrowDate->format('Y-m-d'),
            'return_date' => $returnDate->format('Y-m-d'),
        ];
    }
}
