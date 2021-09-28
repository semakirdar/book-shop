<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        return view('bookCreate');
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
