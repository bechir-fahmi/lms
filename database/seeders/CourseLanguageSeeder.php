<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CourseLanguageSeeder extends Seeder
{
    public function run(): void
    {
        $languages = [
            'English',
            'Arabic',
            'French',
            'Spanish',
            'German',
            'Chinese',
            'Japanese',
            'Portuguese',
            'Russian',
            'Italian',
        ];

        foreach ($languages as $language) {
            \DB::table('course_languages')->insert([
                'name' => $language,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
