<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $book = Book::query()->create([
            'category_id' =>$request->category_id,
            'publisher_id' =>$request->publisher_id,
            'name' => $request->name,
            'page_count' => $request->page_count,
            'publish_date' => $request->publish_date
        ]);

        return redirect()->route('home');
    }
}
