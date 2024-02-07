<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'genre',
        'photo_path',
        'price',
        'is_active',
        'user_id',
    ];
}
