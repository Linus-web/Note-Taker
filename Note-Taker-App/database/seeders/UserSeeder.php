<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Note;
use App\Models\Course;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create some users
        User::factory(10)->create()->each(function ($user) {
            // Each user will have random notes in the courses
            $dv1670 = Course::where('name', 'DV1670')->first();
            $pa1489 = Course::where('name', 'PA1489')->first();

            // Create notes in DV1670 and PA1489
            Note::factory()->count(2)->create([
                'user_id' => $user->id,
                'course_id' => $dv1670->id,
            ]);

            Note::factory()->count(2)->create([
                'user_id' => $user->id,
                'course_id' => $pa1489->id,
            ]);
        });
    }
}
