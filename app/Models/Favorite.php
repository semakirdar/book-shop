<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'book_id'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
