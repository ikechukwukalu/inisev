<?php

namespace Database\Seeders;

use App\Facades\Website;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Website::firstOrCreate([
            'title' => 'ESPN Fake',
        ],
        [
            'title' => 'ESPN Fake',
            'url' => 'https://espnfake.com',
            'active' => '1',
            'created_at' => now()
        ]);

        Website::firstOrCreate([
            'title' => 'CNN Fake',
        ],
        [
            'title' => 'CNN Fake',
            'url' => 'https://cnnfake.com',
            'active' => '1',
            'created_at' => now()
        ]);
    }
}
