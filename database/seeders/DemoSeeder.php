<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🚀 Starting Demo Data Seeding...');

        // Core System Data
        $this->command->info('📦 Seeding Core System Data...');
        $this->call([
            \Modules\Language\database\seeders\LanguageSeeder::class,
            \Modules\Currency\database\seeders\CurrencySeeder::class,
            \Modules\GlobalSetting\database\seeders\GlobalSettingInfoSeeder::class,
            \Modules\GlobalSetting\database\seeders\MarketingSettingSeeder::class,
            \Modules\GlobalSetting\database\seeders\CustomPaginationSeeder::class,
            \Modules\GlobalSetting\database\seeders\EmailTemplateSeeder::class,
            \Modules\GlobalSetting\database\seeders\SeoInfoSeeder::class,
        ]);

        // Payment & Gateway
        $this->command->info('💳 Seeding Payment Gateways...');
        $this->call([
            \Modules\BasicPayment\database\seeders\BasicPaymentDatabaseSeeder::class,
        ]);

        // Users & Permissions
        $this->command->info('👥 Seeding Users & Permissions...');
        $this->call([
            RolePermissionSeeder::class,
            AdminInfoSeeder::class,
            UserSeeder::class,
        ]);

        // Course Prerequisites (Categories, Levels, Languages)
        $this->command->info('� Seedinng Course Prerequisites...');
        $this->call([
            CourseCategorySeeder::class,
            CourseLevelSeeder::class,
            CourseLanguageSeeder::class,
        ]);

        // Courses & Content
        $this->command->info('📚 Seeding Courses...');
        $this->call([
            CourseSeeder::class,
        ]);

        // Frontend & Pages
        $this->command->info('🎨 Seeding Frontend & Pages...');
        $this->call([
            \Modules\SiteAppearance\database\seeders\SiteAppearanceDatabaseSeeder::class,
            \Modules\Frontend\database\seeders\HomePagesSectionSeeder::class,
            FeaturedCourseSeeder::class,
            \Modules\Frontend\database\seeders\FeaturedInstructorSectionSeeder::class,
            \Modules\PageBuilder\database\seeders\PageBuilderDatabaseSeeder::class,
            \Modules\Menubuilder\database\seeders\MenubuilderSeeder::class,
            BrandSeeder::class,
            FaqSeeder::class,
            \Modules\SocialLink\database\seeders\SocialLinkDatabaseSeeder::class,
            \Modules\FooterSetting\database\seeders\FooterSettingDatabaseSeeder::class,
        ]);

        // Certificates & Badges
        $this->command->info('🏆 Seeding Certificates & Badges...');
        $this->call([
            \Modules\CertificateBuilder\database\seeders\CertificateBuilderSeeder::class,
            \Modules\CertificateBuilder\database\seeders\CertificateBuilderItemSeeder::class,
            \Modules\Badges\database\seeders\BadgeSeeder::class,
        ]);

        // Additional Content
        $this->command->info('📝 Seeding Additional Content...');
        $this->call([
            \Modules\Testimonial\database\seeders\TestimonialDatabaseSeeder::class,
            \Modules\InstructorRequest\database\seeders\InstructorRequestSeeder::class,
        ]);

        $this->command->info('✅ Demo Data Seeding Completed!');
        $this->command->info('');
        $this->command->info('📧 Admin: admin@gmail.com / 1234');
        $this->command->info('📧 Instructor: instructor@gmail.com / 1234');
        $this->command->info('📧 Student: student@gmail.com / 1234');
    }
}
