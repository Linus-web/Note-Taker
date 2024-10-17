<?php

namespace App\Http\Controllers;

use App\Models\Course;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Laravel\Prompts\select;

class CourseController extends Controller
{

    public function show()
    {
        return Inertia::render('Courses', [ Course::all()
        ]);
    }

}
