<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteBlock extends Model
{
    use HasFactory;

    protected $fillable = ['note_id', 'type', 'content', 'meta', 'order'];

    // A block belongs to a note
    public function note()
    {
        return $this->belongsTo(Note::class);
    }
}
