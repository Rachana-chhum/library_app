<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;
use App\Models\Member;
use App\Models\Librarian;
use App\Models\Borrower;


class DatabaseSeeder extends Seeder
{
       public function run(): void
    {
        Category::factory()->count(5)->create();
        Book::factory()->count(20)->create();
        Member::factory()->count(10)->create();
        Librarian::factory()->count(3)->create();
        Borrower::factory()->count(15)->create();
    }
}

