<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      if(env("APP_ENV") != "production") {
            $this->call([
                AccountTypeSeeder::class,
                SubjectSeeder::class,
                UserSeeder::class,
                BookSeeder::class,
                BookUserSeeder::class
            ]);
        }
    }
}
