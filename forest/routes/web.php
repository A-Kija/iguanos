<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\SumController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function () {
    return 'Hello my name is Forest';
});

Route::get('/hello/22', function () {
    return 'Hello my name is Forest and I am 22 years old';
});

Route::get('/hello/controller/{color}', [HelloController::class, 'hello']);

Route::get('/hello-blade', [HelloController::class, 'helloBlade']);
Route::get('/bye-blade', [HelloController::class, 'byeByeBlade']);

Route::get('/sum', [SumController::class, 'showForm'])->name('sum-form');
Route::post('/sum', [SumController::class, 'submitForm'])->name('sum-submit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
