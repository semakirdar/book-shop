<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\StoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {

    }

    public function store(StoreRequest $request)
    {
        $comment = Comment::query()->create([
            'user_id' => auth()->user()->id,
            'book_id' => $request->book_id,
            'body' => $request->body,
            'rating' => $request->rating
        ]);
        return redirect()->back();
    }
}
