<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['name' => 'Google', 'image' => 'uploads/website-images/brand-1.png', 'url' => 'https://google.com'],
            ['name' => 'Microsoft', 'image' => 'uploads/website-images/brand-2.png', 'url' => 'https://microsoft.com'],
            ['name' => 'Amazon', 'image' => 'uploads/website-images/brand-3.png', 'url' => 'https://amazon.com'],
            ['name' => 'Meta', 'image' => 'uploads/website-images/brand-4.png', 'url' => 'https://meta.com'],
            ['name' => 'Apple', 'image' => 'uploads/website-images/brand-5.png', 'url' => 'https://apple.com'],
            ['name' => 'Netflix', 'image' => 'uploads/website-images/brand-6.png', 'url' => 'https://netflix.com'],
        ];

        foreach ($brands as $brand) {
            \DB::table('brands')->insert([
                'name' => $brand['name'],
                'image' => $brand['image'],
                'url' => $brand['url'],
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
