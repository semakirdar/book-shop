<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {

    }


    public function favorite($id)
    {
        $favoriteBook = Favorite::query()
            ->where('user_id', auth()->user()->id)
            ->where('book_id', $id)->first();

        if ($favoriteBook) {
            $favoriteBook->delete();
        } else {
            $book = Book::query()->where('id', $id)->firstOrFail();
            $favorite = Favorite::query()->create([
                'user_id' => auth()->user()->id,
                'book_id' => $book->id
            ]);
        }

        return redirect()->back();
    }
}
