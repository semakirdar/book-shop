<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::query()->get();
        return view('authors', [
            'authors' => $authors
        ]);
    }
}
