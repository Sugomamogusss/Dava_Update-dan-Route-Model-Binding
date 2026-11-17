<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Bumi',
            'writer' => 'Tere Liye',
            'published_year' => 2012,
        ]);

        Book::factory()->count(9)->create();
    }
}
