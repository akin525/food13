<?php

namespace App\Http\Controllers\admin;

use App\Models\Colors;
use App\Models\Flavour;
use App\Models\Layers;
use App\Models\Sizes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VariationController
{
function sizeindex()
{
    $size=Sizes::all();
    return view('admin.size', compact('size'));
}
function flavourindex()
{
    $flavour=Flavour::all();
    return view('admin.flavour', compact('flavour'));
}
function layersindex()
{
    $layers=Layers::all();
    return view('admin.layer', compact('layers'));
}
function createsize(Request $request)
{
    $done=$request->validate([
        'name'=>'required',
        'amount'=>'required',
    ]);
    $check=Sizes::where('name', $request->name)->first();
    if ($check){
        $msg="Sizes Already exit";
        return response()->json( $msg, Response::HTTP_CONFLICT);

    }
    $create=Sizes::create($done);

    return response()->json([
        'status'=>'success',
        'message'=>'Size Created',
    ]);
}
function createflavour(Request $request)
{
    $done=$request->validate([
        'name'=>'required',
        'amount'=>'required',
    ]);
    $check=Flavour::where('name', $request->name)->first();
    if ($check){
        $msg="Flavour Already exit";
        return response()->json( $msg, Response::HTTP_CONFLICT);

    }
    $create=Flavour::create($done);

    return response()->json([
        'status'=>'success',
        'message'=>'Flavour Created',
    ]);
}
function createlayers(Request $request)
{
    $done=$request->validate([
        'name'=>'required',
        'amount'=>'required',
    ]);
    $check=Layers::where('name', $request->name)->first();
    if ($check){
        $msg="Layers Already exit";
        return response()->json( $msg, Response::HTTP_CONFLICT);

    }
    $create=Layers::create($done);

    return response()->json([
        'status'=>'success',
        'message'=>'Layers Created',
    ]);
}
function editsizes(Request $request)
{
    $validate=$request->validate([
        'id'=>'required',
        'name'=>'required',
        'amount'=>'required',
    ]);
    $find=Sizes::where('id', $request->id)->first();
    $find->update($validate);
    return response()->json([
        'status' => 'success',
        'message' => 'Size Updated',
    ]);
}
function editflavour(Request $request)
{
    $validate=$request->validate([
        'id'=>'required',
        'name'=>'required',
        'amount'=>'required',
    ]);
    $find=Flavour::where('id', $request->id)->first();
    $find->update($validate);
    return response()->json([
        'status' => 'success',
        'message' => 'Flavour Updated',
    ]);
}
function editlayers(Request $request)
{
    $validate=$request->validate([
        'id'=>'required',
        'name'=>'required',
        'amount'=>'required',
    ]);
    $find=Layers::where('id', $request->id)->first();
    $find->update($validate);
    return response()->json([
        'status' => 'success',
        'message' => 'Layers Updated',
    ]);
}
function indexcolor()
{
    $color=Colors::all();
    return view('admin.color', compact('color'));
}
function createcolor(Request $request)
{
   $done= $request->validate([
        'label'=>'required',
        'name'=>'required',
    ]);
    $check=Colors::where('name', $request->name)->first();
    if ($check){
        $msg="Color Already Exit";
        return response()->json($msg, Response::HTTP_CONFLICT);
    }
    $inser=Colors::create($done);
    return response()->json([
        'status'=>'success',
        'message'=>'Color Created',
    ]);

}
}
