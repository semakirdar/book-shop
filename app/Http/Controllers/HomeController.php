<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $books = Book::query()->with('category')->paginate(15);
        return view('home', [
            'books' => $books
        ]);

    }
}
