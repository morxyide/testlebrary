<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CDController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\VideoController;
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
Route::get('/magazines', [MagazineController::class, 'index'])->name('magazines.index');
Route::get('/magazine/create', [MagazineController::class, 'create'])->name('magazines.create');
Route::post('/magazine', [MagazineController::class, 'store'])->name('magazines.store');
Route::get('/magazine/{magazine}/edit', [MagazineController::class, 'edit'])->name('magazines.edit');
Route::put('/magazine/{magazine}', [MagazineController::class, 'update'])->name('magazines.update');
Route::delete('/magazine/{magazine}', [MagazineController::class, 'destroy'])->name('magazines.destroy');
Route::post('/magazine/{magazine}/borrow', [MagazineController::class, 'borrow'])->name('magazines.borrow');

// CD Routes
Route::get('/cds', [CDController::class, 'index'])->name('cds.index');
Route::get('/cd/create', [CDController::class, 'create'])->name('cds.create');
Route::post('/cd', [CDController::class, 'store'])->name('cds.store');
Route::get('/cd/{cd}/edit', [CDController::class, 'edit'])->name('cds.edit');
Route::put('/cd/{cd}', [CDController::class, 'update'])->name('cds.update');
Route::delete('/cd/{cd}', [CDController::class, 'destroy'])->name('cds.destroy');
Route::post('/cd/{cd}/borrow', [CDController::class, 'borrow'])->name('cds.borrow');

// Video Routes
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('/video/create', [VideoController::class, 'create'])->name('videos.create');
Route::put('/video/{video}', [VideoController::class, 'update'])->name('videos.update');
Route::post('/video', [VideoController::class, 'store'])->name('videos.store');
Route::get('/video/{video}/edit', [VideoController::class, 'edit'])->name('videos.edit');
Route::delete('/video/{video}', [VideoController::class, 'destroy'])->name('videos.destroy');
Route::post('/video/{video}/borrow', [VideoController::class, 'borrow'])->name('videos.borrow');


// Dashboard Route
Route::get('/dashboard', [CustomAuthController::class, 'dashboardPage'])->name('dashboard');

// Authentication Routes
Route::get('/login', [CustomAuthController::class, 'loginPage'])->name('login.page');
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('custom.login');
Route::get('/register', [CustomAuthController::class, 'registerPage'])->name('register.page');
Route::post('/custom-registration', [CustomAuthController::class, 'customRegistration'])->name('custom.registration');
Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');

# Manage users
Route::get('/manage-users', [UserController::class, 'index'])->name('users.index'); # For admin only
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); # For admin only
Route::get('/manage/{user}/borrowings', [UserController::class,'manageBorrowings'])->name('manage.borrowed'); # For admin only

Route::get('/borrowed', [UserController::class, 'borrowedItems'])->name('user.borrowed');
Route::delete('/borrowings/{borrowing}', [UserController::class, 'return'])->name('user.return');


//Route::get('/books', function () {
//    $books = Book::all();
//    return view('index', [
//        'books' => $books,
//    ]);
//});
