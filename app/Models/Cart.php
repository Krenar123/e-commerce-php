<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::creating(function ($cart) {
            $cart->user_id = Auth::id();
        });
    }
    
    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }

}
