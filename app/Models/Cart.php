<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $connection = 'main';

    protected $table = 'carts';

    protected $primaryKey = 'cart_id';

    protected $keyType = 'string';
    
    protected $fillable = [
        'cart_id',
        'ip',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
