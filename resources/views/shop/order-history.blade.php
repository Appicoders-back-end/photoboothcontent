@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order History</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Order Date</th>
                                    <th>Order Total</th>
                                    <th>Paid Amount</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($order_history as $order)
                                    <tr>
                                        <td><a href="{{ route('shop.order-detail',$order->id) }}">#{{ $order->order_no??'-' }}</a></td>
                                        <td>{{ formattedDate($order->created_at)??'-' }}</td>
                                        <td>${{ number_format($order->total_amount)??'-' }}</td>
                                        <td>${{ number_format($order->paid_amount)??'-' }}</td>
                                        <td><label class="badge @if($order->status === "pending") bg-danger @elseif($order->status === "processing") bg-primary @elseif($order->status === "cancel") bg-warning  @elseif($order->status === "completed") bg-success @endif ">{{ strtoupper($order->status)??'-' }}</label></td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
