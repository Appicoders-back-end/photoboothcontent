@extends('layouts.app')
@section('content')
    <div class="container dashboard-container">
        <div class="">
            <div class="row">
                <div class="col-lg-6">
                    <h4>Shipping Address</h4>
{{--                    <p>{{ $order_detail->user->name??'-' }}</p>--}}
                    <p>{{ $order_detail->address??'-' }}</p>
{{--                    <p>Anytown, USA 12345</p>--}}
{{--                    <p>Email: {{ $order_detail->user->email??'-' }}</p>--}}
                </div>
                <div class="col-lg-6">
                    <h4>Order Info</h4>
                    <p>Order Date: {{ formattedDate($order_detail->created_at)??'-' }}</p>
                    <p>Order Number: {{ $order_detail->order_no??'-' }}</p>
{{--                    <p>Payment Method: Credit Card</p>--}}
                    <p>Total Amount: ${{ number_format($order_detail->total_amount,2)??'-' }}</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h4>Order Items</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; $sub_total_amount =0; $grand_total_amount =0;  $delivery_charges =0; $discount =0; @endphp
                            @forelse($order_detail->items as $item)
                                @php $sub_total_amount += $item->price * $item->quantity; @endphp
                                <tr>
                                    <td>{{ $i++??'' }}</td>
                                    <td>{{ $item->product->title??'-' }}</td>
                                    {{--                            <td class="hidden-phone">20 inch Philips LCD Black color monitor</td>--}}
                                    <td class=""> ${{ number_format($item->price,2)??'-' }}</td>
                                    <td class="">{{ $item->quantity??'-' }}</td>
                                    <td> ${{ number_format($item->price * $item->quantity,2)??'-' }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Order Summary
                        </div>
                        <div class="card-body">
                            @php $grand_total_amount = ($sub_total_amount - $delivery_charges) - $discount; @endphp
                            <p>Sub - Total amount : <span class="fw-bold"> ${{ number_format($sub_total_amount) }}</span></p>
                            <p>Delivery Charges : ${{ number_format($order_detail->delivery_charges,2)??'-' }}</p>
                            <p>Grand Total : <span class="fw-bold"> ${{ number_format($grand_total_amount,2) }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            ​
        </div>
    </div>
@endsection
