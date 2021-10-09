<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authors\StoreRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::query()->get();
        return view('Authors.author', [
            'authors' => $authors
        ]);
    }

    public function create()
    {
        return view('Authors.create');
    }

    public function store(StoreRequest $request)
    {
        $author = Author::query()->create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect()->route('authors');
    }
}
