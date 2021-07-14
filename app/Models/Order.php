<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'order_date', 'order_number', 'payment_method', 'billing_subtotal', 'billing_tax', 'billing_total', 'status',
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function menus()
    {
        return $this->belongsToMany('App\Models\Menu')->withPivot('quantity');
    }
}
