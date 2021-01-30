<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $attributes = [
        'shopping_price' => "",
     ];

    protected static function booted()
    {
        static::creating(function ($not) {
            $not->shopping_price = "";
        });
    }
}
