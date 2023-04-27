<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImages;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

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

    public function addToCart($id){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "quantity" => 1,
                "title" => $product->title,
                "description" => $product->description,
                "price" => $product->price,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart(){
        return view('shop.cart');
    }

    public function updateCartItem(Request $request){
        if($request->id && $request->quantity){

            $product = Product::findOrFail($request->id);
//            dd($product->stock);
            $product_in_stock = $product->stock - $request->quantity;
//            dd($product_in_stock);
            if ($product_in_stock  < 0){
//                dd($product_in_stock);
                return redirect()->back()->with('error', 'Product Out of Stock');
            }
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated successfully');
        }
    }

    public function deleteCartItem($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product removed successfully');
        }
    }

    public function checkout(){
        return view('shop.checkout');
    }
}
