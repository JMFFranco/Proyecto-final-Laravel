<?php

use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ComputerController;
use App\Models\Category;
use App\Models\Computer;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CorreoController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'categories' => Category::all(),
        'computers' => Computer::all(),
        'message' => session('message'),
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/computers', function () {
        return Inertia::render('Dashboard');
    })->name('computers');

    Route::resource('categories', CategoryController::class);
    Route::resource('computers', ComputerController::class);
});
