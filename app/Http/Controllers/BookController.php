<?php

namespace App\Http\Controllers;

use App\Http\Requests\Books\StoreRequest;
use App\Models\author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Session;


class BookController extends Controller
{
    public function create()
    {
        $categories = Category::query()->whereNotNull('parent_id')->get();
        $publishers = Publisher::query()->get();
        $favorite = Favorite::query()->get();
        return view('books.bookCreate', [
            'categories' => $categories,
            'publishers' => $publishers,
            'favorite' => $favorite
        ]);
    }

    public function store(StoreRequest $request)
    {
        $book = Book::query()->create([
            'category_id' => $request->category_id,
            'publisher_id' => $request->publisher_id,
            'name' => $request->name,
            'page_count' => $request->page_count,
            'publish_date' => $request->publish_date,
            'description' => $request->description,
        ]);

        $authors = explode(',', $request->author);

        foreach ($authors as $item) {
            $author = Author::query()->where('name', $item)->first();
            if (!$author) {
                $author = Author::query()->create([
                    'name' => $item,
                    'description' => ' '
                ]);
            }

            $book_author = BookAuthor::query()->create([
                'book_id' => $book->id,
                'author_id' => $author->id
            ]);
        }
        $book->addMediaFromRequest('image')->toMediaCollection();
        return redirect()->route('home');
    }

    public function newReleases()
    {
        $books = Book::query()->orderBy('id', 'DESC')->limit(5)->get();
        return view('newReleases', [
            'books' => $books
        ]);
    }

    public function index($categoryId)
    {
        $category = Category::query()->where('id', $categoryId)->first();
        $books = Book::query()->where('category_id', $categoryId)->get();

        return view('books.book', [
            'books' => $books,
            'category' => $category,

        ]);
    }

    public function detail($bookId)
    {
        $comments = Comment::query()->with('user')->where('book_id', $bookId)->get();
        $book = Book::query()->with('publisher')->where('id', $bookId)->first();
        $bookAuthor = BookAuthor::query()->where('book_id', $bookId)->get();
        $favoriteCount = Favorite::query()->where('book_id', $bookId)->count();
        return view('books.bookDetail', [
            'book' => $book,
            'comments' => $comments,
            'authors' => $bookAuthor,
            'favoriteCount' => $favoriteCount
        ]);
    }




}
