<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class ProductController extends Controller
{
    public function edit(Request $request){
        $product = Product::find($request->id);

        if($product){
            return view('admin.edit_product')->with(['product'=>$product]);
        }else{
            dd("Incorrect link");
        }
    }

    public function update(Request $request){

        

        $validator = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'stock' => 'required|integer'
        ]);

        

            $product = Product::find($request->id);

            Session::flash('message', 'An error occurred.');
            Session::flash('alert-class', 'alert-danger');

            if($product){
                if($product->update($request->all())){
                    Session::flash('message', 'Product updated successfully.');
                    Session::flash('alert-class', 'alert-success');
                }
            }

            return redirect()->back();

        
    }

}
