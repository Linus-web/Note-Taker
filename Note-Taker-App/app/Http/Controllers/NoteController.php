<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Inertia\Inertia;

class NoteController extends Controller
{
    public function show(string $id)
    {
        $note = Note::with('user')->findOrFail($id);
        $blocks = $note->blocks;


        return Inertia::render('NoteDetail', [
            'note' => $note,
            'blocks' => $blocks,
        ]);
    }
}
