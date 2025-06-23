<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 5 categories
        Category::factory()->count(5)->create();

        // Create 20 books linked to those categories
        Book::factory()->count(20)->create();
    }
}

