<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'name',
        'contact',
        'address',
        'product_id',
        'qty',
        'price',
        'subtotal',
        'payment_method',
        'status'
    ];
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
}
