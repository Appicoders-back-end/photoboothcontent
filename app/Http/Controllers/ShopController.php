<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Page;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\ProductImages;
use App\Services\StripeService;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Mime\Header\all;

class ShopController extends Controller
{
    public function index()
    {
        $contentPage = Page::firstOrCreate([
            'slug' => 'shop'
        ], [
            'slug' => 'shop',
            'name' => 'Shop'
        ]);

        $products = Product::where("stock", '!=', 0)->get();
        $data = [
            'products' => $products,
            'content' => json_decode($contentPage->content),
        ];

        return view('shop.index', $data);
    }

    public function detail(string $p_id)
    {
        $product = Product::findOrFail($p_id);
        $related_products = Product::whereNot('id', $p_id)->where("stock", '!=', 0)->inRandomOrder()->limit(3)->get();

        return view('shop.detail', compact('product', 'related_products'));
    }

    public function addToCart($id)
    {
        try {

            if (!auth()->check()) {
                return redirect()->route('login')->with('error', 'Please Login First !');
            }

            $product = Product::findOrFail($id);
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $add_to_cart = $cart[$id]['quantity'] + 1;
                $product_in_stock = $product->stock - $add_to_cart;
                if ($product_in_stock < 0) {
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

    public function cart()
    {
        return view('shop.cart');
    }

    public function updateCartItem(Request $request)
    {

        try {

            if ($request->id && $request->quantity) {

                $product = Product::findOrFail($request->id);
                $product_in_stock = $product->stock - $request->quantity;
                if ($product_in_stock < 0) {
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
            if ($id) {
                $cart = session()->get('cart');
                if (isset($cart[$id])) {
                    unset($cart[$id]);
                    session()->put('cart', $cart);
                }
                return redirect()->back()->with('success', 'Product removed successfully');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function checkout()
    {
        $payment_methods = PaymentMethod::where('user_id', auth()->user()->id)->select('id', 'card_holder_name', 'card_brand', 'card_end_number')->get();

        if (!session()->get('cart')) {
            return redirect()->route('shop.cart')->with('error', "You have to add item cart first");
        }

        if (!$payment_methods->count() > 0) {
            return redirect()->route('payment-methods.create')->with('success', "You have to add Payment Card first");
        }
        return view('shop.checkout', compact('payment_methods'));
    }

    public function checkoutProcess(Request $request, StripeService $stripeService)
    {
        try {
            $request->validate([
                "phone_number" => 'required',
                "address" => 'required',
//                "other_instruction" => 'required',
                "payment_method" => 'required',
            ]);

            DB::beginTransaction();

            $user = auth()->user();
            $customerId = $user->stripe_customer_id;
//            $coupon = Coupon::find($request->coupon_id);
            $paymentMethod = PaymentMethod::find($request->payment_method);
//            $price = $coupon->price;
            /* $discount = null;
             if ($request->promo_code_id) {
                 $promoCode = PromoCode::find($request->promo_code_id);
                 $discount = $this->getDiscountedPrice($promoCode, $price);
                 $price = $price - $discount;
             }*/
            $total = 0;
            foreach ((array)session('cart') as $id => $item) {
                $total += $item['price'] * $item['quantity'];
            }
            $order = new Order();
            $discounted_amount = 0;
            $PAID = $total + getDeliveryCharges() - $discounted_amount;
            $order->user_id = $user->id;
            $order->order_no = rand(100000, 999999);
            $order->promo_code_id = null;
            $order->total_amount = $total;
            $order->phone_number = $request->phone_number;
            $order->other_instruction = $request->other_instruction;
            $order->address = $request->address;
            $order->discounted_amount = $discounted_amount;
            $order->delivery_charges = getDeliveryCharges();
            $order->paid_amount = $PAID;

            $charge = $stripeService->createCharge($customerId, $paymentMethod->stripe_source_id, $PAID, "Order payment");
            $order->charge_id = $charge->id;

            $order->save();
            foreach ((array)session('cart') as $id => $item) {
                $order_item = new OrderItem();
                $order_item->order_id = $order->id;
                $order_item->product_id = $id;
                $order_item->price = $item['price'];
                $order_item->quantity = $item['quantity'];
                $order_item->save();
            }

            DB::commit();
            session()->forget('cart');
            return redirect()->route('thankyou')->with('success', 'Order has been placed successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function orderHistory(Request $request)
    {
        $order_history = Order::where("user_id",auth()->user()->id)->orderby('id','desc')->get();
        if (isset($request->status)){
            $order_history = Order::where("user_id",auth()->user()->id)->orderby('id','desc')->where('status',$request->status)->get();
        }

        return view('shop.order-history', compact("order_history"));
    }

    public function orderDetail($id)
    {
        $order_detail = Order::find($id);
        return view('shop.order-detail', compact("order_detail"));
    }

    public function orderStatus($id , StripeService $stripeService){
        try {
            $order = Order::find($id);
            DB::beginTransaction();
            $stripeService->createRefund($order->charge_id,$order->paid_amount);
            $order->status = Order::CANCEL;
            $order->save();
            DB::commit();

            return redirect()->route('shop.order.history')->with('success', 'Order has been canceled successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
