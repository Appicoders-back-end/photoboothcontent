@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Orders
                    </header>
                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                    <tr>
                                        <th>Order No</th>
                                        <th>Customer Name</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr class="gradeX">
                                        <td>{{ $order->order_no ?? '-' }}</td>
                                        <td>{{ $order->user ? $order->user->name : '-' }}</td>
                                        <td>{{ $order->paid_amount ?? 'N/A' }}</td>
                                        <td>
                                            @if($order->status == "active")
                                                <span class="text-success">{{ ucwords($order->status) }}</span>
                                            @else
                                                <span class="text-danger">{{ ucwords($order->status) }}</span>
                                            @endif
                                        </td>
                                        <td>{{ date('F d, Y', strtotime($order->created_at))??'-'}} </td>
                                        <td>
                                            <a href="{{ route('admin.orders.show',$order->id) }}"
                                               class="btn btn-success"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
