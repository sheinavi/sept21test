<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Sale;
use Session;

class HomeController extends Controller
{
    public function index(){

        $data = [
            'products' => Product::all()
        ];

        return view('home')->with($data);
    }

    public function submit_purchase(Request $request){

        $validator = $request->validate([
            'customer' => 'required',
            'quantity' => 'required|min:1',
            'product_id' => 'required|exists:products,id'
        ]);

        $product = Product::find($request->product_id);

        //check if stocks > quantity
        if($product->stock > $request->quantity){

            $current_price = $product->price;
            $request->request->add(['price' => $current_price]);
            $request->request->add(['cost_total' => $current_price * $request->quantity]);

            if(Sale::create( $request->all() )){

                //subtract purchased quantity from stock.
                //normally this should be put in event
                $left_stock = $product->stock - $request->quantity;
                $product->stock = $left_stock;
                $product->save();

                Session::flash('message', 'Purchase successful.');
                Session::flash('alert-class', 'alert-success');

            }else{

                Session::flash('message', 'An error occurred. Please try again.');
                Session::flash('alert-class', 'alert-danger');
            }

        }else{
            Session::flash('message', 'Sorry, not enough stock left for '.$product->name);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back()->withInput();
        }
        
        return redirect()->back();

    }
}
