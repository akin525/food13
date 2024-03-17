<?php

namespace App\Http\Controllers\admin;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController
{
function createcategory(Request $request)
{
    $validatedData= $request->validate([
       'name'=>'required',
       'slug'=>'required',
       'description'=>'required',
   ]);

   Categories::create($validatedData);

   $msg="Category Create Successfully";
   return response()->json([
       'status'=>'success',
       'message'=>$msg,
   ]);
}
function updatecategory(Request $request)
{
    $validatedData= $request->validate([
        'name'=>'required',
        'slug'=>'required',
        'description'=>'required',
    ]);
    $category=Categories::findOrFail($request->id);
    $category->update($validatedData);

    return response()->json([
        'status' => 'success',
        'message' => 'Category updated successfully',
    ]);
}
}
