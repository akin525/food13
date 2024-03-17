<?php


namespace App\Http\Controllers;


use App\Models\Address;
use App\Models\Cart;
use App\Models\Gateways;
use App\Models\Order;
use App\Models\Payments;
use Faker\Provider\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController
{
function postorder(Request  $request)
{
    $request->validate([

    ]);

    $gateway=Gateways::where('name', 'paystack')->first();
    $pkey=$gateway->pkey;
    $payid = mt_rand(1000000000, 9999999999);
    $address=Address::where('user_id', Auth::user()->id)->first();
    if (!$address) {
        $caddress = Address::create([
            'user_id' => Auth::user()->id,
            'address_line1' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'city' => $request->city,
            'country' => $request->country,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
        ]);
    }
    $cart=Cart::where('user_id', Auth::user()->id)->get();
    foreach ($cart as $carts) {
        $order = Order::create([

            'user_id' => Auth::user()->id,
            'order_id' => $carts['id'],
            'name' => $request->name,
            'product_id' => $carts['product_id'],
            'quantity' => 1,
            'image' => $carts['image'],
            'price' => $carts['amount'],
            'subtotal' => $carts['amount'],
            'status' => 0,
            'topper' => $carts['topper'] ?? null,
            'flavour' => $carts['flavour'] ?? null,
            'layer' => $carts['layer'] ?? null,
            'color' => $carts['color'] ?? null,
            'size' => $carts['size'] ?? null,
            'payid'=>$payid,

        ]);

    }

    return view('shop.paynow', compact('request', 'payid', 'pkey'))->with('status', 'Kindly Complete your payment');
}


function confirmpayment($reference, $secondS)
{
    $gateway=Gateways::where('name', 'paystack')->first();
    $skey=$gateway->skey;
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".$skey,
            "Cache-Control: no-cache",
        ),0
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
//             echo $response;
    }
//        return $response;
    $data=json_decode($response, true);
    $amount=$data["data"]["amount"]/100;
    if ($data['status'] == true){
        $create=Payments::where('transaction_id', $reference)->first();
        if ($create){
            return redirect('cart')->with('errors', 'Duplicate Payment');
        }
        $put=Payments::create([
            'order_id'=>$secondS,
            'user_id'=>Auth::user()->id,
            'name'=>Auth::user()->name,
            'amount'=>$amount,
            'payment_method'=>'Paystack',
            'transaction_id'=>$reference,
            'status'=>1,
        ]);
        $check=Order::where('payid', $secondS)->get();

        foreach ($check as $cic){
            $cic->pay = 1;
            $cic->save();
        }

        return  redirect('dashboard')->with('status', 'Payments Successful');
    }
    return  redirect('dashboard')->with('errors', 'Please contact admin');

}
}
