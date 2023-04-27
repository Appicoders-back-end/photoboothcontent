<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImages;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){

        $products=Product::where("stock",'!=',0)->get();
        return view('shop.index',compact("products"));
    }

    public function detail(string $p_id){

        $product=Product::findOrFail($p_id);

        $related_products=Product::whereNot('id',$p_id)->where("stock",'!=',0)->inRandomOrder()->limit(3)->get();

        return view('shop.detail',compact('product','related_products'));
    }

    public function addToCart($id){
        try {

            if (!auth()->check()) {
                return redirect()->route('login')->with('error', 'Please Login First !');
            }

            $product = Product::findOrFail($id);
            $cart = session()->get('cart', []);
            if(isset($cart[$id])) {
                $add_to_cart = $cart[$id]['quantity'] + 1;
                $product_in_stock = $product->stock - $add_to_cart;
                if ($product_in_stock  < 0){
                    return redirect()->back()->with('error', 'Product Out of Stock');
                }
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

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function cart(){
        return view('shop.cart');
    }

    public function updateCartItem(Request $request){

        try {

            if($request->id && $request->quantity){

                $product = Product::findOrFail($request->id);
                $product_in_stock = $product->stock - $request->quantity;
                if ($product_in_stock  < 0){
                    return redirect()->back()->with('error', 'Product Out of Stock');
                }
                $cart = session()->get('cart');
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Cart updated successfully');

            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function deleteCartItem($id)
    {
        try {
            if($id) {
                $cart = session()->get('cart');
                if(isset($cart[$id])) {
                    unset($cart[$id]);
                    session()->put('cart', $cart);
                }
                return redirect()->back()->with('success', 'Product removed successfully');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function checkout(){
        return view('shop.checkout');
    }
}
