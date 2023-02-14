<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'dni',
    ];

    // Relacion N:N
    public function book() {
        return $this->belongsTo(Book::class)->withTimestamps();
    }
}
