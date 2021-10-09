<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id'
    ];

    public function items(){
        return $this->hasMany(OrderBook::class);
    }
}
