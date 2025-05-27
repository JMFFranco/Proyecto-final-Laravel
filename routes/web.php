<?php

use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ComputerController;
use App\Http\Controllers\PurchaseController;
use App\Models\Category;
use App\Models\Computer;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'categories' => Category::orderBy('category_name', 'asc')->get(),
        'computers' => Computer::with('category')->orderBy('computer_id', 'asc')->get(),
        'message' => session('message'),
        'canLogin' => Route::has('login'),
        //'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::post('/computers/{slug}/purchase', [PurchaseController::class, 'sendConfirmationEmail'])
    ->middleware('auth')
    ->name('computers.purchase');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'canRegister' => Route::has('register'),
        ]);
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('computers', ComputerController::class);
});
