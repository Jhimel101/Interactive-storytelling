<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\InsightController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::middleware(['auth', 'role:author'])->group(function () {
    Route::get('/author/dashboard', [StoryController::class, 'index'])->name('author.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [StoryController::class, 'dashboard'])->name('dashboard');


    Route::get('/author/stories/create', [StoryController::class, 'create'])->name('stories.create');
    Route::post('/author/stories', [StoryController::class, 'store'])->name('stories.store');
    Route::get('/author/dashboard', [StoryController::class, 'dashboard'])->name('author.dashboard');



    Route::get('/stories/{story}', [ChoiceController::class, 'show'])->name('stories.show');
    Route::post('/choices/{choice}/select', [InsightController::class, 'store'])->name('choices.select');
    Route::get('/user/dashboard', [StoryController::class, 'dashboard'])->name('user.dashboard');
    Route::post('/choices/{choice}/select', [ChoiceController::class, 'select'])->name('choices.select');

    Route::post('/choices', [ChoiceController::class, 'store'])->name('choices.store');
    Route::get('/choices/{story}', [ChoiceController::class, 'show'])->name('choices.show');
    Route::post('/insights/{choiceId}', [InsightController::class, 'store'])->name('insights.store');
});

require __DIR__ . '/auth.php';
