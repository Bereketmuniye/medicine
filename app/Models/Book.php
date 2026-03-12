<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_id', 'title', 'slug', 'description', 'price', 
        'type', 'cover', 'file', 'stock'
    ];

    protected $casts = [
        'cover' => 'array',
    ];
}
