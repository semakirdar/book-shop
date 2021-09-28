<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create(Request $request)
    {

        return view('bookCreate');
    }

    public function store()
    {

    }
}
