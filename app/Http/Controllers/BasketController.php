<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function store($bookId)
    {
        $basket = session()->get('basket');
        if (is_null($basket))
            $basket = [];

        array_push($basket, $bookId);
        session(['basket' => $basket]);

        return redirect()->back();
    }

    public function index()
    {
        $books = [];
        $basket = session()->get('basket');

        foreach ($basket as $item) {
            $book = Book::query()->where('id', $item)->first();
            array_push($books, $book);
        }
        return view('basket', [
            'books' => $books
        ]);
    }

    public function delete($id)
    {
        $basket = session()->get('basket');
        $index = array_search($id, $basket);
        if($index > -1){
            unset($basket[$index]);
            session(['basket' => $basket]);
        }

        return redirect()->back();
    }

}
