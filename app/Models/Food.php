<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'T_food';

    protected $fillable = [
        'name',
        'category',
        'image',
        'price',
        'description',
    ];
}
