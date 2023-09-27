<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ColorController as C;
use App\Http\Controllers\AnimalController as A;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['prefix' => 'animals'], function () {
    Route::get('/', [A::class, 'index'])->name('animals.index');
    Route::get('/list', [A::class, 'list'])->name('animals.list');
    Route::post('/', [A::class, 'store'])->name('animals.store');
    Route::put('/{animal}', [A::class, 'update'])->name('animals.update');
    Route::delete('/{animal}', [A::class, 'destroy'])->name('animals.destroy');
});

Route::get('/colors', [C::class, 'index'])->name('colors.index');
Route::get('/colors-b', [C::class, 'indexB'])->name('colors.index-b');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
