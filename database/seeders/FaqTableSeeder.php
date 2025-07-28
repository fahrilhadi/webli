<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faqs')->insert([
            [
                'content_title' => 'What is WeBLI?',
                'content_description' => 'WeBLI is an online learning platform designed specifically for English Education students. It provides access to video lessons, MP3 audio materials, and downloadable resources to support your learning anytime, anywhere.',
            ],
            [
                'content_title' => 'Is WeBLI free to use?',
                'content_description' => 'Yes! WeBLI is completely free for registered students. You just need to create an account using your email to get started.',
            ],
            [
                'content_title' => 'Can I download the materials for offline use?',
                'content_description' => 'Absolutely. All video and audio materials on WeBLI are available for download, so you can study even without an internet connection.',
            ],
            [
                'content_title' => 'How do I access the materials after registering?',
                'content_description' => 'Once you register and log in, you will be directed to your dashboard where you can browse and select available learning materials easily.',
            ],
            [
                'content_title' => 'Who can I contact if i experience technical issues?',
                'content_description' => 'If you face any issues or need help, you can reach out to our support team through the contact form on the website or email us at support@webli.com.',
            ],
        ]);
    }
}
