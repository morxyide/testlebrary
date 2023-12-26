<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomAuthController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route("dashboard");
});

Route::get('/library', [LibraryController::class, 'index'])->name('library.index');

// Books Routes
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
Route::post('/books/{book}/borrow', [BookController::class, 'borrow'])->name('books.borrow');

// Magazines Routes
Route::get('/magazine', [MagazineController::class, 'index'])->name('magazines.index');


// Dashboard Route
Route::get('/dashboard', [CustomAuthController::class, 'dashboardPage'])->name('dashboard');

// Authentication Routes
Route::get('/login', [CustomAuthController::class, 'loginPage'])->name('login.page');
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('custom.login');
Route::get('/register', [CustomAuthController::class, 'registerPage'])->name('register.page');
Route::post('/custom-registration', [CustomAuthController::class, 'customRegistration'])->name('custom.registration');
Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');

# Manage users
Route::get('/manage-users', [UserController::class, 'index'])->name('users.index');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/borrowed', [UserController::class, 'borrowedItems'])->name('user.borrowed');


//Route::get('/books', function () {
//    $books = Book::all();
//    return view('index', [
//        'books' => $books,
//    ]);
//});
