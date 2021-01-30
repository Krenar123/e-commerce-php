<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::creating(function ($cart) {
            $cart->user_id = Auth::id();
        });
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'products',
        'price',
        'city',
        'address',
        'email',
        'name',
    ];
}
