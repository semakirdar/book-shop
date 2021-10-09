<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderBook;
use Illuminate\Http\Request;

class OrderContorller extends Controller
{
    public function index()
    {
        if (!empty(auth()->user()->id)) {
            $orders = Order::query()->with('items')->where('user_id', auth()->user()->id)->get();

            return view('orderBook', [
                'orders' => $orders,
            ]);
        } else {
            return view('login');
        }
    }

    public function store()
    {
        $order = Order::query()->create([
            'user_id' => auth()->user()->id
        ]);
        $basket = session()->get('basket');
        foreach ($basket as $item) {
            $orderBooks = OrderBook::query()->create([
                'order_id' => $order->id,
                'book_id' => $item
            ]);
        }
        return redirect()->route('home');
    }
}
