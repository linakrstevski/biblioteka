<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $table = 'rent';

    public function knigi() {
        return $this->belongsToMany(Books::class, 'rent', 'user_id', 'book_id');
    }

}
