<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_id',
        'publisher_id',
        'name',
        'page_count',
        'publish_date'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
