<?php

namespace App\Http\Controllers;

use App\Http\Requests\Books\StoreRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class BookController extends Controller
{
    public function create()
    {
        $categories = Category::query()->whereNotNull('parent_id')->get();
        $publishers = Publisher::query()->get();
        return view('bookCreate', [
            'categories' => $categories,
            'publishers' => $publishers
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
            'description' => $request->description
        ]);

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
        return view('book', [
            'books' => $books,
            'category' => $category
        ]);
    }

    public function detail($bookId)
    {
        $book = Book::query()->with('publisher')->where('id', $bookId)->first();
        return view('bookDetail', [
            'book' => $book
        ]);
    }
}
