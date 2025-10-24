<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseLevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            'Beginner',
            'Intermediate',
            'Advanced',
            'Expert',
            'All Levels',
        ];

        foreach ($levels as $level) {
            $levelId = \DB::table('course_levels')->insertGetId([
                'slug' => Str::slug($level),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Add translation
            \DB::table('course_level_translations')->insert([
                'course_level_id' => $levelId,
                'lang_code' => 'en',
                'name' => $level,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
