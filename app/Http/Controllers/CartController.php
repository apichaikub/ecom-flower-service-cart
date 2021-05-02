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
        $carts = Cart::where('ip', $clientIpAddress)
            ->where('deleted_at', null)
            ->count();
        $isCartExist = $carts > 0;
        if($carts > 0) {
            return response('cart already created', 400);
        }

        $cartId = Str::uuid()->toString();
        $cart = Cart::create([
            'cart_id' => $cartId,
            'ip' => $clientIpAddress,
        ]);
        $cart->cart_id = $cartId;
        
        return new CartResource($cart); 
    }
}
