<?php

namespace App\Http\Controllers\admin;

use App\Models\Gateways;
use App\Models\Homepage;
use App\Models\Settings;
use Illuminate\Http\Request;

class SetiingsController
{
function loadsettings()
{
    $setting=Settings::where('id', 1)->first();
    $homepage=Homepage::get();

    return view('admin.settings', compact('setting', 'homepage'));
}
function changepage(Request $request)
{
    $request->validate([
        'page'=>'required',
    ]);
    $check=Homepage::where('status', "1")->first();

    $check->status=0;
    $check->save();
    $page=Homepage::where('page',$request->page)->first();

     $page->status=1;
     $page->save();

     $msg="Page Switch Successfully";

     return response()->json([
         'status'=>'success',
         'message'=>$msg,
     ]);
}
function gatewayindex()
{
    $gateway=Gateways::where('name', 'paystack')->first();
return view('admin.gateway', compact( 'gateway'));
}
function updategateway(Request $request)
{
    $request->validate([
        'sk'=>'required',
        'pk'=>'required',
    ]);

    $gateway=Gateways::where('name', 'paystack')->first();

    $gateway->skey=$request->sk;
    $gateway->pkey=$request->pk;
    $gateway->save();

    return response()->json([
        'status'=>'success',
        'message'=>'Paystack updated',
    ]);
}

function aboutindex()
{
    $abouts=Settings::where('id', 1)->first();
    $about=$abouts->about;
    return view('admin.about', compact('about'));
}
function updateabout(Request $request){
    $request->validate([
        'contents'=>'required',
    ]);

    $abouts=Settings::where('id', 1)->first();
    $abouts->about= $request->contents;
    $abouts->save();
    return response()->json([
        'status'=>'success',
        'message'=>'About-us updated',
    ]);
}
}
