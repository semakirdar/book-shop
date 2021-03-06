<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'id',
        'category_id',
        'publisher_id',
        'name',
        'page_count',
        'publish_date',
        'description'
    ];

    protected $appends = [
        'is_favorited'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function bookAuthor()
    {
        return $this->hasMany(BookAuthor::class);
    }

    public function getIsFavoritedAttribute()
    {
        if (Auth::check()) {
            return Favorite::query()
                ->where('book_id', $this->id)
                ->where('user_id', auth()->user()->id)
                ->exists();
        } else {
            return false;
        }
    }
}
