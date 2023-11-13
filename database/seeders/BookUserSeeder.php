<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\BookUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 70; $i++) {

            $randomUser = User::inRandomOrder()->first();
            $randomBook = Book::inRandomOrder()->first();

            BookUser::create([
                'user_id' => $randomUser->id,
                'book_id' =>$randomBook->id
            ]);
        }
    }
}
