<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Sale;

class AdminController extends Controller
{
    public function index(){

        $products = Product::all();
        $sales = Sale::all();

        $data = [
            'products' => $products,
            'sales' => $sales
        ];
        return view('admin.dashboard')->with($data);
    }
}
