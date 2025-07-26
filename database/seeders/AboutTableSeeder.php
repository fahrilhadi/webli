<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            [
                'description' => 'Welcome to our platform! Where learning meets innovation. We are a team of passionate educators, developers, and designers who believe that quality education should be accessible, engaging, and tailored to everyone’s unique pace. Wheter your just starting out or looking to deepen your knowledge, we provide tools and resources that help you grow with confidence.',
                'image' => 'about.png',
            ]
        ]);
    }
}