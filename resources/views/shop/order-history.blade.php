@extends('layouts.app')
@section('content')
    <div class="container dashboard-container">
        <div class="my-5">
            <form id="filter_order_status" class="d-flex justify-content-between align-items-center filter-order" action="{{ route('shop.order.history') }}">
                <div>
                    <select class="form-select" aria-label="Default select example" name="status" required>
                        <option selected="" disabled>Filter the order status</option>
                        <option value="pending" >Pending</option>
                        <option value="completed">Completed</option>
                        <option value="processing">Processing</option>
                        <option value="cancel">Canceled</option>
                    </select>
                </div>
                <button type="submit" id="filter_order" class="btn btn-main">Filter</button>
            </form>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12 mb-4">
                @include('layouts.messages')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order History</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Order Date</th>
                                    <th>Order Total</th>
                                    <th>Paid Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($order_history as $order)
                                    <tr>
                                        <td><a href="{{ route('shop.order-detail',$order->id) }}">#{{ $order->order_no??'-' }}</a></td>
                                        <td style="white-space: nowrap">{{ formattedDate($order->created_at)??'-' }}</td>
                                        <td>${{ number_format($order->total_amount)??'-' }}</td>
                                        <td>${{ number_format($order->paid_amount)??'-' }}</td>
                                        <td><label class="badge @if($order->status === "pending") bg-danger @elseif($order->status === "processing") bg-primary @elseif($order->status === "cancel") bg-warning  @elseif($order->status === "completed") bg-success @endif "> @if($order->status === "cancel") {{ strtoupper($order->status."ED")??'-' }} @else {{ strtoupper($order->status)??'-' }} @endif</label></td>
                                        <td>
                                            <a href="{{ route('shop.orders.status',$order->id) }}" class="btn btn-danger btn-sm delete-confirm @if($order->status !== "pending") disabled @endif" style="white-space: nowrap">Cancel Order</a>
                                        </td>
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
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        $(function () {

            $('.delete-confirm').click(function (event) {
                event.preventDefault();
                var url = $(this).attr("href");
                swal({
                    title: "Are you sure?",
                    text: "You want to cancel it!",
                    icon: "warning",
                    type: "warning",
                    buttons: ["No","Yes!"],
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Cancel it!'
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
@endsection
