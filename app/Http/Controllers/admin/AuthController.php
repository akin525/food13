<?php

namespace App\Http\Controllers\admin;

use App\Models\Categories;
use App\Models\Order;
use App\Models\Orders;
use App\Models\Payments;
use App\Models\Products;
use App\Models\Rtb;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController
{
function loginadmin()
{
    return view('admin.login');
}
function authloginadmiin(Request $request)
{
    $request->validate([
        'email'=>'required',
        'password'=>'required',
    ]);
    $user = User::where('email', $request->email)
        ->where('role', 'admin')
        ->first();

    if (!isset($user) || !Hash::check($request->password, $user->password)) {
        return redirect()->back()->withInput($request->only('email', 'remember'))
            ->with('errors','Invalid credentials or you have not been assigned as an admin.');
    }

    Auth::login($user);

    return redirect()->intended('admin/dashboard')->withSuccess('Signed in');
}
 function dashboardadmin()
 {
     $totalrevenue=Payments::sum('amount');
     $orders=Order::count();
     $products=Products::sum('quantity');
     $date = Carbon::now()->format("Y-m");
     $monthly=Orders::where([['created_at', 'LIKE', $date . '%']])->sum('total_price');
     $date1 = Carbon::now()->format("Y-m-d");

     $todayorder=Order::where([['created_at', 'LIKE', $date1 . '%']])->count();
     $newusers=User::where([['created_at', 'LIKE', $date1 . '%']])->count();
     $alluser=User::count();

     return view('admin.dashboard', compact('todayorder', 'totalrevenue',
     'orders', 'products', 'monthly', 'newusers', 'alluser'
     ));
 }
 function allproduct()
 {
     $category=Categories::all();
     $product=Products::orderBy('id', 'DESC')->paginate('10');

     return view('admin.products', compact('product', 'category'));
 }
 function allorder()
 {
     $order=Orders::all();

     return view('admin.orders', compact('order'));
 }
 function allcustomer()
 {
     $users=User::all();

     return view('admin.users', compact('users'));
 }
 function allpayment()
 {
     $payments=Payments::all();
     return view('admin.payments', compact('payments'));
 }
 function category()
 {
     $category=Categories::all();

     return view('admin.category', compact('category'));
 }
function allrtg()
{
    $product=Rtb::paginate('10');
    $category=Categories::all();
    return view('admin.products1', compact('product', 'category'));
}
    public function getTransactions()
    {
        $transactions = Payments::selectRaw('DATE(created_at) as date, SUM(amount) as total_amount')
            ->groupBy('date')
            ->orderBy('date', 'ASC')->limit(10)
            ->get();

        $dates = $transactions->pluck('date')->toArray();
        $amounts = $transactions->pluck('total_amount')->toArray();

        return response()->json([
            'dates' => $dates,
            'amounts' => $amounts,
        ]);
    }
    public function getTransactions1()
    {
        $transactions = Order::selectRaw('DATE(created_at) as date, SUM(price) as total_amount')
            ->groupBy('date')
            ->orderBy('date', 'ASC')->limit(10)
            ->get();

        $dates = $transactions->pluck('date')->toArray();
        $amounts = $transactions->pluck('total_amount')->toArray();

        return response()->json([
            'dates' => $dates,
            'amounts' => $amounts,
        ]);
    }

}
