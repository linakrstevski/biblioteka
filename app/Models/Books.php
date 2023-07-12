<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table='book';

    public function pisatel() {
        return $this->belongsToMany(Authors::class, 'author_has_book', 'book_id', 'author_id');
    }

    public function kategorii() {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}



