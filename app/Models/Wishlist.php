<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    public function product(){
        return $this->belongsTo('App\Models\Product', 'id_product', 'id');
    }
}
