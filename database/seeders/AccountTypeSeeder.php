<?php

namespace Database\Seeders;

use App\Models\accountType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['admin', 'user'];

        foreach ($types as $type) {
            accountType::create([
                'account_type' => $type
            ]);
        }
    }
}
