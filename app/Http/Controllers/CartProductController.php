<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Http\Resources\CartProductResource;
use App\Http\Resources\CartProductCollection;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CartProductController extends Controller
{
    public function index($cartId)
    {
        $cart = Cart::find($cartId);

        if(!$cart) {
            return response(null, 204);
        }

        $cartProducts = CartProduct::where('cart_id', $cart->cart_id)->get();

        return new CartProductCollection($cartProducts);
    }

    public function create(Request $request, $cartId, $productId)
    {
        $cartProducts = CartProduct::where('cart_id', $cartId)->where('product_id', $productId)->count();
        $isExistInCart = $cartProducts > 0;
        if($isExistInCart) {
            return response('this product is already exist in cart', 400);
        }

        $cartOrderId = Str::uuid()->toString();
        $quantity = $request->input('quantity');
        $cartProduct = CartProduct::create([
            'cart_order_id' => $cartOrderId,
            'cart_id' => $cartId,
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
        $cartProduct->cart_order_id = $cartOrderId;

        return new CartProductResource($cartProduct);
    }

    public function destroy($cartId, $productId)
    {
        CartProduct::where('cart_id', $cartId)->where('product_id', $productId)->delete();

        return response(null, 204);
    }

    public function update(Request $request, $cartId, $productId)
    {
        $cartProduct = CartProduct::where('cart_id', $cartId)->where('product_id', $productId);
        $cartProduct->update([
            'quantity' => $request->input('quantity'),
        ]);

        return response(null, 204);
    }
}
