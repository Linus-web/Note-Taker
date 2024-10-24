<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'is_public', 'user_id', 'course_id', 'content'];

    // A note belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A note belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
