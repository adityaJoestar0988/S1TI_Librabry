<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/book-types',[BookTypeController::class, 'index']);

Route::resource('book-types',BookTypeController::class);

// Route::resource('books', BookController::class);
Route::get('/books', [BookController::class, 'index']);

Route::get('/contact-us', [HomeController::class,'contact']);

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Pastikan hanya user yang sudah login yang bisa meminjam
Route::middleware('auth')->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    // Nanti kita tambah route untuk index (riwayat)
});

// Tambahkan baris ini untuk menampilkan halaman daftar
//PAK ANGLING
Route::resource('book-types', BookTypeController::class)->middleware(['auth',
'role:admin']);
Route::resource('books', BookController::class)->middleware(['auth', 'role:admin']);

//ATUR CRUD
 

Route::get('/books/create', [BookController::class, 'create'])->name('books.create')
->middleware(['auth', 'role:admin']);

Route::get('/books', [BookController::class, 'index'])->name('books.index')
->middleware(['auth', 'role:user,admin']);

Route::post('/books', [BookController::class, 'store'])->name('books.store')
->middleware(['auth', 'role:admin']);

Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show')
->middleware(['auth', 'role:admin']);

Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit')
->middleware(['auth', 'role:admin']);

Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update')
->middleware(['auth', 'role:admin']);

Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy')
->middleware(['auth', 'role:admin']);