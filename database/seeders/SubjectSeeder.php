<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subs = ['eco', 'law', 'tec', 'math'];

        foreach ($subs as $sub) {
            Subject::create([
                'subject' => $sub
            ]);
        }
    }
}
