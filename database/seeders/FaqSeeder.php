<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'How do I enroll in a course?',
                'answer' => 'To enroll in a course, simply browse our course catalog, select the course you want, and click the "Enroll Now" button. You will be guided through the payment process.',
            ],
            [
                'question' => 'Can I get a refund if I am not satisfied?',
                'answer' => 'Yes, we offer a 30-day money-back guarantee. If you are not satisfied with the course, you can request a refund within 30 days of purchase.',
            ],
            [
                'question' => 'Do I get a certificate after completing a course?',
                'answer' => 'Yes, upon successful completion of a course, you will receive a certificate of completion that you can share on your resume or LinkedIn profile.',
            ],
            [
                'question' => 'How long do I have access to a course?',
                'answer' => 'Once you enroll in a course, you have lifetime access to all course materials, including future updates.',
            ],
            [
                'question' => 'Can I download course videos?',
                'answer' => 'Some courses allow video downloads for offline viewing. Check the course details to see if this feature is available.',
            ],
            [
                'question' => 'Are there any prerequisites for courses?',
                'answer' => 'Prerequisites vary by course. Each course page lists any required knowledge or skills. Beginner courses typically have no prerequisites.',
            ],
            [
                'question' => 'How do I become an instructor?',
                'answer' => 'Click on "Become an Instructor" in the menu, fill out the application form, and our team will review your request within 2-3 business days.',
            ],
            [
                'question' => 'What payment methods do you accept?',
                'answer' => 'We accept all major credit cards, PayPal, and bank transfers. All payments are processed securely through our payment gateway.',
            ],
        ];

        foreach ($faqs as $faq) {
            $faqId = \DB::table('faqs')->insertGetId([
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Add translation
            \DB::table('faq_translations')->insert([
                'faq_id' => $faqId,
                'lang_code' => 'en',
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
