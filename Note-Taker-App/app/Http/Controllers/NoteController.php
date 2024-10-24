<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NoteController extends Controller
{
    public function show(string $id)
    {
        $note = Note::with(['user:name'])->select('title','content',"course_id")->findOrFail($id);
        return Inertia::render('NoteDetail', [
            'note' => $note
        ]);
    }

    public function createNote(string $courseId){
        return Inertia::render('NoteCreation', [
            'course' => $courseId
        ]);
    }

    public function store(Request $request){

           // Validate the incoming request
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'course_id' => 'required|exists:courses,id',
    ]);
    // Create the note
    $note = Note::create([
        'title' => $validated['title'],
        'content' => $validated['content'],
        'course_id' => $validated['course_id'],
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('course', [
        'id' => $validated['course_id'],
    ])->with(
        'message', 'Your note was created successfully'
    );
    }

}
