<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Resources\CartResource;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()
    {
        // TODO: get client ip address
        $clientIpAddress = '199.9.9.9';
        $cart = Cart::where('ip', $clientIpAddress)->first();

        if(!$cart) {
            return response(null, 204);
        }

        return new CartResource($cart);
    }

    public function create()
    {
        // TODO: get client ip address
        $clientIpAddress = '199.9.9.9';
        $cartId = Str::uuid()->toString();
        $cart = Cart::create([
            'cart_id' => $cartId,
            'ip' => $clientIpAddress,
        ]);
        $cart->cart_id = $cartId;
        
        return new CartResource($cart); 
    }
}
