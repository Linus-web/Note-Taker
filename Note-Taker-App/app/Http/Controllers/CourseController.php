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


    public function show(string $id)
{
    $course = Course::findOrFail($id);

    $notes = $course->notes()
        ->select('id', 'title', 'content', 'updated_at', 'user_id')
        ->with('user:id,name')
        ->orderBy('updated_at', 'desc')
        ->get();


    $notes->makeHidden('user_id');
    $notes->each(function ($note) {
        $note->user->makeHidden('id');
    });

    return Inertia::render('Course', [
        'course' => $course,
        'notes' => $notes
    ]);
}



}
