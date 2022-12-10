<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function product()
    {
        return $this->belongsTo('App\User','product_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Transaction','transaction_id', 'id');
    }
}
