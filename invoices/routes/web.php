<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController as I;
use App\Http\Controllers\ClientController as C;
use App\Http\Controllers\ProductController as P;

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


Route::prefix('invoices')->name('invoices-')->group(function () {
    Route::get('/', [I::class, 'index'])->name('index'); // all invoices
    Route::get('/show/{invoice}', [I::class, 'show'])->name('show'); // show one invoice

    Route::get('/create', [I::class, 'create'])->name('create'); // show create form
    Route::get('/edit/{invoice}', [I::class, 'edit'])->name('edit'); // show edit form
    Route::get('/delete/{invoice}', [I::class, 'delete'])->name('delete'); // show delete confirmation

    Route::post('/', [I::class, 'store'])->name('store'); // store new invoice
    Route::put('/{invoice}', [I::class, 'update'])->name('update'); // update existing invoice
    Route::delete('/{invoice}', [I::class, 'destroy'])->name('destroy'); // delete existing invoice

    Route::get('/show-line', [I::class, 'showLine'])->name('show-line'); // show one empty invoice line
});

Route::prefix('clients')->name('clients-')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index'); // all clients
    Route::get('/show/{client}', [C::class, 'show'])->name('show'); // show one client

    Route::get('/create', [C::class, 'create'])->name('create'); // show create form
    Route::get('/edit/{client}', [C::class, 'edit'])->name('edit'); // show edit form
    Route::get('/delete/{client}', [C::class, 'delete'])->name('delete'); // show delete confirmation

    Route::post('/', [C::class, 'store'])->name('store'); // store new client
    Route::put('/{client}', [C::class, 'update'])->name('update'); // update existing client
    Route::delete('/{client}', [C::class, 'destroy'])->name('destroy'); // delete existing client
});

Route::prefix('products')->name('products-')->group(function () {
    Route::get('/', [P::class, 'index'])->name('index'); // all products
    Route::get('/show/{product}', [P::class, 'show'])->name('show'); // show one product

    Route::get('/create', [P::class, 'create'])->name('create'); // show create form
    Route::get('/edit/{product}', [P::class, 'edit'])->name('edit'); // show edit form
    Route::get('/delete/{product}', [P::class, 'delete'])->name('delete'); // show delete confirmation

    Route::post('/', [P::class, 'store'])->name('store'); // store new product
    Route::put('/{product}', [P::class, 'update'])->name('update'); // update existing product
    Route::delete('/{product}', [P::class, 'destroy'])->name('destroy'); // delete existing product
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
