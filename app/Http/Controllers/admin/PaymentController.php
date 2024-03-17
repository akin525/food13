<?php

namespace App\Http\Controllers\admin;

use App\Models\Payments;

class PaymentController
{
function allpayment()
{
    $payment=Payments::paginate(10);

    return view('admin.payments', compact('payment'));
}
function viewpayment($id)
{
    $payment=Payments::where('id', $id)->first();
    return response()->json($payment);

}
}
