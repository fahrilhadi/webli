<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('features')->insert([
            [
                'content_title' => 'Video Lessons',
                'content_subtitle' => 'Learn various topics through engaging educational videos',
            ],
            [
                'content_title' => 'Audio Lessons',
                'content_subtitle' => 'Listen to lessons on the go with flexible MP3 audio formats',
            ],
            [
                'content_title' => 'Downloadable Materials',
                'content_subtitle' => 'Download videos and audios to study offline anytime, anywhere',
            ],
        ]);
    }
}
