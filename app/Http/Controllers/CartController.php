<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController
{
function removefromcart($request)
{
    if (Auth::user()) {
        $cart = Cart::where('id', $request)->delete();
        $msg = "Product Removed";
    }else{
        $productId = $request;

        $cart = session()->get('cart', []);

        if(isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);
        $msg = "Product Removed";

    }
    return response()->json([
        'status'=>1,
        'message'=>$msg,
    ]);
}
function clearcart()
{
    if (Auth::user()) {
        $cart = Cart::where('user_id', Auth::user()->id)->delete();
        $msg = "Cart clear Successful";
    }else{
        session()->forget('cart');
        $msg = "Cart clear Successful";

    }
    return response()->json([
        'status'=>1,
        'message'=>$msg,
    ]);
}

}
