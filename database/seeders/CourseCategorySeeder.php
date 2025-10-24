<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Web Development', 'icon' => 'fas fa-code', 'order' => 1],
            ['name' => 'Mobile Development', 'icon' => 'fas fa-mobile-alt', 'order' => 2],
            ['name' => 'Data Science', 'icon' => 'fas fa-chart-line', 'order' => 3],
            ['name' => 'Machine Learning', 'icon' => 'fas fa-robot', 'order' => 4],
            ['name' => 'Cloud Computing', 'icon' => 'fas fa-cloud', 'order' => 5],
            ['name' => 'Cybersecurity', 'icon' => 'fas fa-shield-alt', 'order' => 6],
            ['name' => 'Database Management', 'icon' => 'fas fa-database', 'order' => 7],
            ['name' => 'DevOps', 'icon' => 'fas fa-cogs', 'order' => 8],
            ['name' => 'UI/UX Design', 'icon' => 'fas fa-palette', 'order' => 9],
            ['name' => 'Game Development', 'icon' => 'fas fa-gamepad', 'order' => 10],
            ['name' => 'Business', 'icon' => 'fas fa-briefcase', 'order' => 11],
            ['name' => 'Marketing', 'icon' => 'fas fa-bullhorn', 'order' => 12],
        ];

        foreach ($categories as $category) {
            $categoryId = \DB::table('course_categories')->insertGetId([
                'slug' => Str::slug($category['name']),
                'order' => $category['order'],
                'icon' => $category['icon'],
                'parent_id' => null,
                'show_at_trending' => rand(0, 1),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Add translation
            \DB::table('course_category_translations')->insert([
                'course_category_id' => $categoryId,
                'lang_code' => 'en',
                'name' => $category['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Add subcategories for Web Development
        $webDevId = \DB::table('course_categories')->where('slug', 'web-development')->first()->id;

        $subcategories = [
            ['name' => 'Frontend Development', 'parent_id' => $webDevId],
            ['name' => 'Backend Development', 'parent_id' => $webDevId],
            ['name' => 'Full Stack Development', 'parent_id' => $webDevId],
        ];

        foreach ($subcategories as $index => $subcategory) {
            $subId = \DB::table('course_categories')->insertGetId([
                'slug' => Str::slug($subcategory['name']),
                'order' => $index + 1,
                'icon' => 'fas fa-code',
                'parent_id' => $subcategory['parent_id'],
                'show_at_trending' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            \DB::table('course_category_translations')->insert([
                'course_category_id' => $subId,
                'lang_code' => 'en',
                'name' => $subcategory['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
