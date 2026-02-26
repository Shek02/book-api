<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'published_year',
        'genre',
    ];

    /**
     * Relationship: A book can have many authors
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}