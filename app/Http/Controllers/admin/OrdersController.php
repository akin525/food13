<?php

namespace App\Http\Controllers\admin;

use App\Models\Address;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;

class OrdersController
{
function loadorders()
{
    $order=Order::paginate(20);
    return view('admin.orders', compact('order'));
}
function vieworders($request)
{
    $order=Order::where('id', $request)->first();
    $product=Products::where('id', $order->product_id)->first();
    $address=Address::where('user_id', $order->user_id)->first();
    $user=User::where('id', $order->user_id)->first();

    return view('admin.orderdetail', compact('order', 'product', 'address','user'));
}
}
