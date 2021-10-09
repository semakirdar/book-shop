<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutContorller;
use App\Http\Controllers\OrderBookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PublisherController;
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

Route::post('/basket/{bookId}', [BasketController::class, 'store'])->name('basket.store');
Route::get('/basket', [BasketController::class, 'index'])->name('basket');
Route::post('/basket/delete/{id}', [BasketController::class, 'delete'])->name('basket.delete');


Route::get('/comments', [CommentController::class, 'index'])->name('comments');
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

Route::get('/category/detail/{id}', [CategoryController::class, 'detail'])->name('category.detail');


Route::post('/book/favorite/{id}', [FavoriteController::class, 'favorite'])->name('book.favorite');
Route::get('/favorite/book/user', [FavoriteController::class, 'favoriteBook'])->name('favorite.book.user');
Route::post('/favorite/book/delete/{bookId}', [FavoriteController::class, 'deleteFavorite'])->name('favorite.book.delete');


Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/orderBook', [OrderController::class, 'index'])->name('order.book');

Route::get('/best/seller', [OrderBookController::class, 'bestSeller'])->name('best.seller');

Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('/author/store', [AuthorController::class, 'store'])->name('author.store');

Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers');
Route::get('/publisher/create', [PublisherController::class, 'create'])->name('publisher.create');
Route::post('/publisher/store', [PublisherController::class, 'store'])->name('publisher.store');
