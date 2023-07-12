<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;
    protected $table = 'author';

    public function knigi() {
        return $this->belongsToMany(Books::class, 'author_has_book', 'author_id', 'book_id');
    }
   
}
