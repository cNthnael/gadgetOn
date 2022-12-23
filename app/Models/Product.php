<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'release', 'desc', 'price', 'image_path'
    ];

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
