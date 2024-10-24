<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Note;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Laravel\Prompts\select;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        return Inertia::render('Courses', [
            'courses' => $courses
        ]);
    }


    public function show(string $id){

        $course = Course::findOrFail($id);
        $notes = $course->notes()->with('user')->get();


        return Inertia::render('Course', ['course' => $course, 'notes' => $notes]);

    }



}
