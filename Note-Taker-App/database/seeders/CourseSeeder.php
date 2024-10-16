<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Create the courses DV1670 and PA1489
        Course::create(['name' => 'DV1670', 'description' => 'Course DV1670 Description']);
        Course::create(['name' => 'PA1489', 'description' => 'Course PA1489 Description']);
    }
}
