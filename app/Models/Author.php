<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
    ];

    /**
     * Relationship: An author can have many books
     */
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
