<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutContorller;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LogoutContorller::class, 'logout'])->name('logout');

Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
Route::get('/new/releases', [BookController::class, 'newReleases'])->name('new.release');
Route::get('/books/{categoryId}', [BookController::class, 'index'])->name('books');
Route::get('/book/detail/{bookId}', [BookController::class, 'detail'])->name('book.detail');


Route::get('/comments', [CommentController::class, 'index'])->name('comments');
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

Route::get('/category/detail/{id}', [CategoryController::class, 'detail'])->name('category.detail');


Route::post('/book/favorite/{id}', [FavoriteController::class, 'favorite'])->name('book.favorite');
Route::get('/favorite/book/user', [FavoriteController::class, 'favoriteBook'])->name('favorite.book.user');
Route::post('/favorite/book/delete/{bookId}', [FavoriteController::class, 'deleteFavorite'])->name('favorite.book.delete');
