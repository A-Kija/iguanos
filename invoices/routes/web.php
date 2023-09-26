<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController as I;
use App\Http\Controllers\ClientController as C;
use App\Http\Controllers\ProductController as P;
use App\Http\Controllers\HomeController as H;
use App\Http\Controllers\TagController as T;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [H::class, 'index'])->name('home');
Route::get('/home', [H::class, 'index'])->name('home');


Route::prefix('invoices')->name('invoices-')->group(function () {
    Route::get('/', [I::class, 'index'])->name('index')->middleware('role:admin|manager|user'); // all invoices
    Route::get('/show/{invoice}', [I::class, 'show'])->name('show')->middleware('role:admin|manager|user'); // show one invoice

    Route::get('/create', [I::class, 'create'])->name('create')->middleware('role:admin|manager'); // show create form
    Route::get('/edit/{invoice}', [I::class, 'edit'])->name('edit')->middleware('role:admin|manager'); // show edit form
    Route::get('/delete/{invoice}', [I::class, 'delete'])->name('delete')->middleware('role:admin|manager'); // show delete confirmation

    Route::post('/', [I::class, 'store'])->name('store')->middleware('role:admin|manager'); // store new invoice
    Route::put('/{invoice}', [I::class, 'update'])->name('update')->middleware('role:admin|manager'); // update existing invoice
    Route::delete('/{invoice}', [I::class, 'destroy'])->name('destroy')->middleware('role:admin|manager'); // delete existing invoice

    Route::get('/show-line', [I::class, 'showLine'])->name('show-line')->middleware('role:admin|manager'); // show one empty invoice line
    // download pdf
    Route::get('/download/{invoice}', [I::class, 'download'])->name('download')->middleware('role:admin|manager|user'); // download invoice pdf
});

Route::prefix('clients')->name('clients-')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index')->middleware('role:admin|manager|user'); // all clients
    Route::get('/show/{client}', [C::class, 'show'])->name('show')->middleware('role:admin|manager|user'); // show one client

    Route::get('/create', [C::class, 'create'])->name('create')->middleware('role:admin|manager'); // show create form
    Route::get('/edit/{client}', [C::class, 'edit'])->name('edit')->middleware('role:admin|manager'); // show edit form
    Route::get('/delete/{client}', [C::class, 'delete'])->name('delete')->middleware('role:admin|manager'); // show delete confirmation

    Route::post('/', [C::class, 'store'])->name('store')->middleware('role:admin|manager'); // store new client
    Route::put('/{client}', [C::class, 'update'])->name('update')->middleware('role:admin|manager'); // update existing client
    Route::delete('/{client}', [C::class, 'destroy'])->name('destroy')->middleware('role:admin|manager'); // delete existing client
});

Route::prefix('products')->name('products-')->group(function () {
    Route::get('/', [P::class, 'index'])->name('index')->middleware('role:admin|manager|user'); // all products
    Route::get('/show/{product}', [P::class, 'show'])->name('show')->middleware('role:admin|manager|user'); // show one product

    Route::get('/create', [P::class, 'create'])->name('create')->middleware('role:admin|manager'); // show create form
    Route::get('/edit/{product}', [P::class, 'edit'])->name('edit')->middleware('role:admin|manager'); // show edit form
    Route::get('/delete/{product}', [P::class, 'delete'])->name('delete')->middleware('role:admin|manager'); // show delete confirmation

    Route::post('/', [P::class, 'store'])->name('store')->middleware('role:admin|manager'); // store new product
    Route::put('/{product}', [P::class, 'update'])->name('update')->middleware('role:admin|manager'); // update existing product
    Route::delete('/{product}', [P::class, 'destroy'])->name('destroy')->middleware('role:admin|manager'); // delete existing product

    Route::get('/show-line', [P::class, 'showLine'])->name('show-line')->middleware('role:admin|manager'); // show one empty image line
});

Route::prefix('tags')->name('tags-')->group(function () {
    Route::get('/', [T::class, 'index'])->name('index')->middleware('role:admin|manager|user'); // all tags
    Route::get('/list', [T::class, 'list'])->name('list')->middleware('role:admin|manager|user'); // list tags
    Route::post('/', [T::class, 'store'])->name('store')->middleware('role:admin|manager'); // store new tag
    Route::delete('/{tag}', [T::class, 'destroy'])->name('destroy')->middleware('role:admin|manager'); // delete existing tag
    Route::put('/{tag}', [T::class, 'update'])->name('update')->middleware('role:admin|manager'); // update existing tag

    Route::post('/product-add/{product}', [T::class, 'productAdd'])->name('product-add')->middleware('role:admin|manager'); // add tag to product
    Route::delete('/product-remove/{product}/{tag}', [T::class, 'productRemove'])->name('product-remove')->middleware('role:admin|manager');

});

// Client search with axios
Route::get('/clients/search', [C::class, 'search'])->name('clients-search')->middleware('role:admin|manager|user');



Auth::routes(['register' => false]);


