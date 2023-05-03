@extends('layouts.app')
@section('content')
    <div class="container dashboard-container">
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
                                        <td>{{ formattedDate($order->created_at)??'-' }}</td>
                                        <td>${{ number_format($order->total_amount)??'-' }}</td>
                                        <td>${{ number_format($order->paid_amount)??'-' }}</td>
                                        <td><label class="badge @if($order->status === "pending") bg-danger @elseif($order->status === "processing") bg-primary @elseif($order->status === "cancel") bg-warning  @elseif($order->status === "completed") bg-success @endif ">{{ strtoupper($order->status)??'-' }}</label></td>
                                        <td>
                                            <a href="{{ route('shop.orders.status',$order->id) }}" class="btn btn-danger btn-sm delete-confirm @if($order->status !== "pending") disabled @endif">Cancel Order</a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function () {

            $('.delete-confirm').click(function (event) {
                event.preventDefault();
                var url = $(this).attr("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to cancel the order!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Cancel it !',
                    cancelButtonText: "Don't Cancel it !"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                })
            });

        });
    </script>
@endsection
