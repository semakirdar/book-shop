<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $books = Book::query()->with('category')->get();
        return view('home', [
            'books' => $books
        ]);
    }
}
