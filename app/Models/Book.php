<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function getDescriptionAttribute($value){
        return substr($value, 1, 120);
    }

    // Relacion 1:N - N Book 1 User
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Relacion N:N
    public function author() {
        return $this->belongsToMany(Author::class)->withTimestamps();
    }
}
