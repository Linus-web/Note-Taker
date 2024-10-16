<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NoteBlock;
use App\Models\Note;

class NoteSeeder extends Seeder
{
    public function run()
    {
        // Add blocks to existing notes
        Note::all()->each(function ($note) {
            // Create 3-4 blocks per note
            NoteBlock::factory()->count(3)->create(['note_id' => $note->id]);
        });
    }
}
