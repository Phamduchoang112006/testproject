<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /** @use HasFactory<\Database\Factories\RestaurantFactory> */
    use HasFactory;

    protected $table = 'T_restaurant';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category',
        'ingredients',
    ];
}
