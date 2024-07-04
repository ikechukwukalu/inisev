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
            'name' => 'ESPN Fake',
        ],
        [
            'name' => 'ESPN Fake',
            'url' => 'https://espnfake.com',
            'active' => '1',
            'created_at' => now()
        ]);

        Website::firstOrCreate([
            'name' => 'CNN Fake',
        ],
        [
            'name' => 'CNN Fake',
            'url' => 'https://cnnfake.com',
            'active' => '1',
            'created_at' => now()
        ]);
    }
}
