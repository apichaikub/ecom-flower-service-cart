<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $connection = 'main';

    protected $table = 'cart_products';

    protected $primaryKey = 'cart_order_id';

    protected $keyType = 'string';

    protected $casts = [
        'quantity' => 'float',
    ];
    
    protected $fillable = [
        'cart_order_id',
        'cart_id',
        'product_id',
        'quantity',
        'created_at',
        'updated_at',
    ];
}
