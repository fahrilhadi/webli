<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HowToUseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('how_to_uses')->insert([
            [
                'content_title' => 'Create an Account',
                'content_subtitle' => 'Sign up for free using your active email',
            ],
            [
                'content_title' => 'Login',
                'content_subtitle' => 'Access your personal learning anytime',
            ],
            [
                'content_title' => 'Choose Your Material',
                'content_subtitle' => 'Browse through curated videos and audio resources',
            ],
            [
                'content_title' => 'Start Your Lessons',
                'content_subtitle' => 'Study at your own pace—online or offline',
            ],
        ]);
    }
}
