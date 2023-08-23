<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

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
