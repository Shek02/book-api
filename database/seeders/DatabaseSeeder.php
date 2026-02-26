<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $authors = Author::factory(10)->create();

        Book::factory(20)->create()->each(function ($book) use ($authors) {
            $book->authors()->sync($authors->random(rand(1, 3))->pluck('id')->toArray());
        });
    }
}