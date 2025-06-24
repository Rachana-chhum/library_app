<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;
use App\Models\Librarian;
use App\Models\Member;
use App\Models\Borrower;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Category::factory(5)->create();
        Book::factory(10)->create();
        Member::factory(10)->create();
        Librarian::factory(3)->create();
        Borrower::factory(15)->create();
    }
}
