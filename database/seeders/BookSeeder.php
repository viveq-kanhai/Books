<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Subject;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {

            $randomSubject = Subject::inRandomOrder()->first();

            Book::create([
                'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'author' => $faker->firstName().' '.$faker->lastName(),
                'price' =>$faker->randomFloat(2, 100, 1500),
                'subject_id' => $randomSubject->id,
                'file_path' => 'placeholder/path'
            ]);
        }
    }
}
