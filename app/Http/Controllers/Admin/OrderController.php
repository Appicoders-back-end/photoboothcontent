<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->orderByDesc('id')->get();

        $data = [
            'orders' => $orders
        ];

        return view('admin.orders.index', $data);
    }

    public function show($id)
    {
        $order = Order::with('items.product', 'user')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function orderStatus(Request $request , $id , StripeService $stripeService){
        try {
            $order = Order::find($id);

            DB::beginTransaction();

            if ($request->status === Order::PENDING){
                $order->status = Order::PENDING;
            }elseif ($request->status === Order::PROCESSING){
                $order->status = Order::PROCESSING;
            }elseif ($request->status === Order::COMPLETED){
                foreach ($order->items as $item){
                    $product = Product::find($item->product_id);
//                    dd($product);
                    $product->stock = ($product->stock - $item->quantity);
                    $product->save();
                }
                $order->status = Order::COMPLETED;
            }elseif ($request->status === Order::CANCEL){
                $stripeService->createRefund($order->charge_id,$order->paid_amount,'refund');
                $order->status = Order::CANCEL;
            }
            $order->save();
            DB::commit();

            return redirect()->route('admin.orders.index')->with('success', 'Order Status has been updated successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
