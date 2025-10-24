<?php

namespace Modules\Testimonial\database\seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Modules\Testimonial\app\Models\Testimonial;
use Modules\Testimonial\app\Models\TestimonialTranslation;

class TestimonialDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Skip faker - just create simple testimonials
        $testimonials = [
            ['name' => 'John Smith', 'designation' => 'Software Engineer', 'comment' => 'Great platform for learning! The courses are well-structured and easy to follow.', 'rating' => 5],
            ['name' => 'Sarah Johnson', 'designation' => 'Web Developer', 'comment' => 'I learned so much from these courses. Highly recommended for anyone wanting to improve their skills.', 'rating' => 5],
            ['name' => 'Michael Brown', 'designation' => 'Data Scientist', 'comment' => 'Excellent instructors and comprehensive content. Worth every penny!', 'rating' => 4],
        ];

        foreach ($testimonials as $testimonial) {

            $data = new Testimonial();
            $data->image = "uploads/website-images/testimonial-" . rand(1, 3) . ".jpg";
            $data->rating = $testimonial['rating'];
            $data->status = true;
            if ($data->save()) {
                foreach (allLanguages() as $language) {
                    $dataTranslation = new TestimonialTranslation();
                    $dataTranslation->lang_code = $language->code;
                    $dataTranslation->testimonial_id = $data->id;
                    $dataTranslation->name = $testimonial['name'];
                    $dataTranslation->designation = $testimonial['designation'];
                    $dataTranslation->comment = $testimonial['comment'];
                    $dataTranslation->save();
                }
            }
        }
    }
}
