<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('homes')->insert([
            [
                'title' => 'Improve Your Listening Skill with Us',
                'subtitle' => 'Discover your passion with WeBLI Learns anytime, anywhere!',
            ]
        ]);
    }
}
