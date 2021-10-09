<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\OrderBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderBookController extends Controller
{
    public function bestSeller()
    {
        $bestSellers = OrderBook::query()
            ->select(DB::raw('count(*) as count, book_id'))
            ->groupBy('book_id')
            ->orderBy('count', 'DESC')->limit(5)
            ->get();
        return view('bestSeller', [
            'bestSellers' => $bestSellers
        ]);
    }

}
