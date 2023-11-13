<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        User::create([
            'firstName' => 'dev',
            'lastName' => 'account',
            'password'=> Hash::make('devPass'),
            'account_type_id' => 1
        ]);

        for ($i = 0; $i < 30; $i++) {
            User::create([
                'firstName' => $faker->firstName(),
                'lastName' => $faker->lastName(),
                'password' => Hash::make($faker->password()),
                'account_type_id' => 2
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            $name = $faker->firstName();
            User::create([
                'firstName' => $faker->firstName(),
                'lastName' => $faker->lastName(),
                'password' => Hash::make($faker->password()),
                'account_type_id' => 3
            ]);
        }
    }
}
