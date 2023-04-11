<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImages;

class ShopController extends Controller
{
    public function index(){

        $products=Product::all();

        return view('shop.index',compact("products"));
    }

    public function detail(string $p_id){
        
        $product=Product::findOrFail($p_id);

        $related_products=Product::whereNot('id',$p_id)->inRandomOrder()->limit(3)->get();

        return view('shop.detail',compact('product','related_products'));
    }
}
