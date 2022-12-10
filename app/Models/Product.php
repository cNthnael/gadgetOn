<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function cart()
    {
        return $this->hasMany('App\Cart','product_id','id');
    }
}
