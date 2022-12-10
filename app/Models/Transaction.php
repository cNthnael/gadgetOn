<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','user_id', 'id');
    }

    public function cart()
    {
        return $this->hasMany('App\Cart','transaction_id','id');
    }
}
