<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FQ;
use Illuminate\Http\Request;

class FqController extends Controller
{
function indexfq()
{
    $faq=FQ::all();
    return view('admin.fq', compact('faq'));
}
function createfq(Request $request)
{
    $validate=$request->validate([
        'heading'=>'required',
        'content'=>'required',
    ]);

    $insert=FQ::create($validate);

    $msg="F&Q Created Successful";
    return response()->json([
        'status'=>'success',
        'message'=>$msg,
    ]);
}
function editfq($id)
{
    $fq=FQ::where('id', $id)->first();
}
function updatefq(Request $request)
{
    $validate=$request->validate([
        'heading'=>'required',
        'content'=>'required',
    ]);

    $check=FQ::findOrFail($request->id);
    $check->update($validate);
    return response()->json([
        'status' => 'success',
        'message' => 'FAQ updated successfully',
    ]);
}
}
