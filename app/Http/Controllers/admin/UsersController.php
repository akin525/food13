<?php

namespace App\Http\Controllers\admin;

use App\Models\Address;
use App\Models\Order;
use App\Models\Payments;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController
{
function allcustomer()
{
//    $user=User::paginate(10);
    $user=User::all();

    return view('admin.users', compact('user'));
}
function editcustomer($id)
{
    $user=User::where('id', $id)->first();
    $order=Order::where('user_id', $user->id)->get();
    $orderc=Order::where('user_id', $user->id)->count();
    $payment=Payments::where('user_id', $user->id)->get();
    $payments=Payments::where('user_id', $user->id)->sum('amount');
    $address=Address::where('user_id', $user->id)->first();

    return view('admin.edituser', compact('user', 'order', 'payment',
       'orderc', 'payments', 'address'));
}
function searchuser()
{
    return view('admin.searchuser');
}
function searchresult(Request $request)
{
    $request->validate([
        'name'=>'required',
    ]);

    $user=User::where('name', 'LIKE', "%$request->name%")->get();

    return view('admin.searchuser', compact('user'));
}
}
