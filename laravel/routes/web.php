<?php

use App\Http\Controllers\DiscussController;
use App\Models\Topic;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('discuss')->name('discuss.')->group(function () {
    Route::get('/', [DiscussController::class, 'index'])->name('index');
    Route::get('/{topic}', [DiscussController::class, 'posts'])->name('posts');
});
