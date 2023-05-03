@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- invoice start-->
        <section>
            <div class="card card-primary">
                <!--<div class="card-heading navyblue"> INVOICE</div>-->
                <div class="card-body">
                    <div class="row invoice-list">
                        <div class="col-md-12 text-center corporate-id">
                            <img src="img/vector-lab.jpg" alt="">
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <h4>SHIPPING ADDRESS</h4>
                            <p>
                                {{ $order->address??'-' }}
                                {{--Vector Lab<br>
                                Road 1, House 2, Sector 3<br>
                                ABC, Dreamland 1230<br>
                                P: +38 (123) 456-7890<br>--}}
                            </p>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <h4>USER INFO</h4>
                            <ul class="unstyled">
                                <li>User Name: <strong>{{ $order->user->name??'-' }}</strong></li>
                                <li>User Email: {{ $order->user->email??'-' }}</li>
                                <li>Contact Number: {{ $order->user->contact_no??'-' }}</li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <h4>ORDER INFO</h4>
                            <ul class="unstyled">
                                <li>Order Number : <strong>{{ $order->order_no??'-' }}</strong></li>
                                <li>Order Date : {{ formattedDate($order->created_at)??'-' }}</li>
                                <li>Other Instruction : {{ $order->other_instruction??'-' }} </li>
{{--                                <li>Due Date : 2013-03-20</li>--}}
                                <li>Order Status : <label class="badge @if($order->status === "pending") badge-danger @elseif($order->status === "processing") badge-primary @elseif($order->status === "cancel") badge-warning  @elseif($order->status === "completed") badge-success @endif ">{{ strtoupper($order->status)??'-' }}</label></li>
                            </ul>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
{{--                            <th class="hidden-phone">Image</th>--}}
                            <th class="">Unit Cost</th>
                            <th class="">Quantity</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 1; $sub_total_amount =0; $grand_total_amount =0;  $delivery_charges =0; $discount =0; @endphp
                        @forelse($order->items as $item)
                            @php $sub_total_amount += $item->price * $item->quantity; @endphp
                            <tr>
                                <td>{{ $i++??'' }}</td>
                                <td>{{ $item->product->title??'-' }}</td>
                                {{--                            <td class="hidden-phone">20 inch Philips LCD Black color monitor</td>--}}
                                <td class="">$ {{ number_format($item->price,2)??'-' }}</td>
                                <td class="">{{ $item->quantity??'-' }}</td>
                                <td>$ {{ number_format($item->price * $item->quantity,2)??'-' }}</td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    <div class="row justify-content-end">
                        <div class="col-lg-3 invoice-block ">
                            <ul class="unstyled amounts">
                                <li style="display: flex; justify-content: space-between;color: #000;text-align: left;"><span style="font-weight: bold;">Subtotal  :</span> <span style="display: block; text-align:right;">${{ number_format($sub_total_amount) }}</span></li>
                                <li style="display: flex; justify-content: space-between;color: #000;text-align: left;"><span style="font-weight: bold;">Delivery Charges :</span> <span style="display: block; text-align:right;">${{ number_format($order->delivery_charges,2)??'-' }}</span></li>
{{--                                <li><strong>Discount :</strong> 10%</li>--}}
                                @php $grand_total_amount = ($sub_total_amount - $delivery_charges) - $discount; @endphp
                                <li style="display: flex; justify-content: space-between;color: #000;text-align: left;"><span style="font-weight: bold;">Total :</span> <span style="display: block; text-align:right;">${{ number_format($order->paid_amount,2) }}</span></li>
                            </ul>
                        </div>
                    </div>
                    {{--<div class="text-center invoice-btn">
                        <a class="btn btn-danger text-light"><i class="fa fa-check"></i> Submit Invoice </a>
                        <a class="btn btn-info text-light" onclick="javascript:window.print();"><i
                                class="fa fa-print"></i> Print </a>
                    </div>--}}
                </div>
            </div>
        </section>
        <!-- invoice end-->
    </section>
@endsection
