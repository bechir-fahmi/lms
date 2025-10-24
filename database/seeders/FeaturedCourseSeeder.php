<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeaturedCourseSeeder extends Seeder
{
    public function run(): void
    {
        // Get category IDs
        $categoryIds = \DB::table('course_categories')
            ->whereNull('parent_id')
            ->pluck('id')
            ->toArray();

        if (empty($categoryIds)) {
            $this->command->warn('No categories found. Please run CourseCategorySeeder first.');
            return;
        }

        // Get course IDs for each category
        $allCourseIds = \DB::table('courses')->where('status', 'active')->pluck('id')->toArray();

        $data = [
            'all_category' => null,
            'all_category_ids' => json_encode(array_slice($allCourseIds, 0, 8)),
            'all_category_status' => 1,
        ];

        // Assign courses to first 5 categories
        for ($i = 1; $i <= 5; $i++) {
            if (isset($categoryIds[$i - 1])) {
                $categoryId = $categoryIds[$i - 1];
                $coursesInCategory = \DB::table('courses')
                    ->where('category_id', $categoryId)
                    ->where('status', 'active')
                    ->pluck('id')
                    ->toArray();

                $data["category_{$this->numberToWord($i)}"] = $categoryId;
                $data["category_{$this->numberToWord($i)}_ids"] = json_encode(array_slice($coursesInCategory, 0, 8));
                $data["category_{$this->numberToWord($i)}_status"] = 1;
            }
        }

        $data['created_at'] = now();
        $data['updated_at'] = now();

        \DB::table('featured_course_sections')->updateOrInsert(['id' => 1], $data);
    }

    private function numberToWord($num)
    {
        $words = ['one', 'two', 'three', 'four', 'five'];
        return $words[$num - 1] ?? 'one';
    }
}
