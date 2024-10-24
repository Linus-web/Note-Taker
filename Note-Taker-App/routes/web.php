<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/user', [ProfileController::class, 'show'])->middleware('auth')->name('user');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/courses', [CourseController::class,'index'])->middleware(['auth', 'verified'])->name('courses');
Route::get('/courses/{id}', [CourseController::class, 'show'] )->middleware(['auth', 'verified'])->name('course');


Route::get('/notes/{note_id}', [NoteController::class, 'show'])->middleware(['auth'])->name('note.show');
Route::get('/notes/{course}/create', [NoteController::class, 'createNote'])->middleware(['auth'])->name('note.create.view');
Route::post('/notes', [NoteController::class, 'store'])->middleware(['auth'])->name('note.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
