<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'code',
        'description',
        'image',
        'price',
        'size',
        'is_spicy',
        'is_veg',
        'is_best_offer'
    ];
}
