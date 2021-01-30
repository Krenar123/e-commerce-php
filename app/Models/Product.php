<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $attributes = [
        'image' => "",
        'ordered' => 0,
     ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function ($product) {
            $product->user_id = Auth::id();
            $product->ordered = 1;
        });
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name',
        'product_price',
        'product_size',
        'product_description',
        'product_category',
    ];
}
