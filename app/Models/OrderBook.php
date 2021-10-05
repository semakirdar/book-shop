<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'book_id',
        'order_id'
    ];
}
