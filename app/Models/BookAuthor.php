<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'book_id',
        'author_id'
    ];

    protected $with = [
        'author'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
