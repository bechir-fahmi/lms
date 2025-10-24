<?php

namespace Modules\Frontend\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Frontend\app\Models\FeaturedInstructor;

class FeaturedInstructorSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get instructor IDs
        $instructorIds = DB::table('users')->where('role', 'instructor')->pluck('id')->toArray();

        FeaturedInstructor::updateOrCreate(
            ['id' => 1],
            ['instructor_ids' => json_encode($instructorIds)]
        );
    }
}
