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
                                        <td>${{ number_format($order->paid_amount,2)?? '-' }}</td>
                                       {{-- <td>
                                            @if($order->status == "active")
                                                <span class="text-success">{{ ucwords($order->status) }}</span>
                                            @else
                                                <span class="text-danger">{{ ucwords($order->status) }}</span>
                                            @endif
                                        </td>--}}
                                        <td width="1%">
                                            @if($order->status == "completed")
                                                <label class="badge @if($order->status === "completed") badge-success @endif ">{{ strtoupper($order->status)??'-' }}</label>
                                            @endif
                                            @if($order->status == "cancel")
                                                    <label class="badge @if($order->status === "cancel") badge-warning @endif ">{{ strtoupper($order->status)??'-' }}</label>
                                            @endif
                                            <div class="col-md-3 mb-3 @if($order->status == "completed" || $order->status == "cancel") d-none @endif">
                                                <form action="{{ route('admin.orders.status',$order->id) }}"
                                                      method="GET">
                                                    <select class="form-control mb-2" id="status" name="status">
                                                        <option value="" disabled selected>Select Status</option>
                                                        <option style="background-color:transparent;" value="pending"
                                                                @if($order->status == "processing") disabled @endif
                                                                @if($order->status == 'pending') selected @endif>
                                                            PENDING
                                                        </option>
                                                        <option value="processing"
                                                                @if($order->status == "processing") selected @endif>PROCESSING
                                                        </option>
                                                        <option value="completed"
                                                                @if($order->status == "completed") selected @endif>COMPLETED
                                                        </option>
                                                        <option value="cancel"
                                                                @if($order->status == "cancel") selected @endif>CANCEL
                                                        </option>
                                                    </select>
                                                </form>
                                            </div>
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
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('change', '#status', function () {
                this.form.submit();
            });
        });
    </script>
@endsection
