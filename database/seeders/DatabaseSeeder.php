<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserTableSeeder::class);
        $this->call(HomeTableSeeder::class);
        $this->call(AboutTableSeeder::class);
        $this->call(FeatureTableSeeder::class);
        $this->call(HowToUseTableSeeder::class);
        $this->call(FaqTableSeeder::class);
    }
}
