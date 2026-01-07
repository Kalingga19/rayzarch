<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Admin\AdminNoteController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/architecture', [PublicController::class, 'architecture'])->name('architecture');
Route::get('/interior', [PublicController::class, 'interior'])->name('interior');
Route::get('/design', [PublicController::class, 'design'])->name('design');

Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/media', [NoteController::class, 'index'])->name('notes.index'); // “media” sesuai sidebar kamu :contentReference[oaicite:13]{index=13}
Route::get('/media/{note}', [NoteController::class, 'show'])->name('notes.show');

Route::get('/services', [PublicController::class, 'services'])->name('services');

Route::get('/message', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/message', [FeedbackController::class, 'store'])->name('feedback.store');

Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'contactSend'])->name('contact.send');

// Admin area
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', Admin\AdminProjectController::class);
    Route::resource('notes', Admin\AdminNoteController::class);
    Route::get('about', [Admin\AdminAboutController::class, 'edit'])->name('about.edit');
    Route::post('about', [Admin\AdminAboutController::class, 'update'])->name('about.update');
    Route::get('feedback', [Admin\AdminFeedbackController::class, 'index'])->name('feedback.index');
});


require __DIR__.'/auth.php';
