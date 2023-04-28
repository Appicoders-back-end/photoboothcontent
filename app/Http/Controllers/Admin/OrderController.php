<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();

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

    public function orderStatus(Request $request , $id){
        try {
            $order = Order::find($id);

            if ($request->status === Order::PENDING){
                $order->status = Order::PENDING;
            }elseif ($request->status === Order::PROCESSING){
                $order->status = Order::PROCESSING;
            }elseif ($request->status === Order::COMPLETED){
                $order->status = Order::COMPLETED;
            }elseif ($request->status === Order::CANCEL){
                $order->status = Order::CANCEL;
            }

            $order->save();
            return redirect()->route('admin.orders.index')->with('success', 'Order Status has been updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
