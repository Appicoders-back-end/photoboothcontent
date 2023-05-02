@extends('layouts.app')
@section('content')
    <main id="cart" class="mx-auto" style="max-width:960px; margin-top: 100px; padding: 100px 0;">
        @include('layouts.messages')
        <h1>Your Cart</h1>
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-12 col-sm-8 items">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $subTotal = 0 @endphp
                            @forelse((array) session('cart') as  $id => $item)
                                @php $subTotal += $item['price'] * $item['quantity'] @endphp
                                <tr>
                                    <td><img class="w-100" src="assets/img/camera3.jpg" alt="art image"></td>
                                    <td>{{ $item['title'] }}</td>
                                    <td>${{ number_format($item['price'],2) }}</td>
                                    <td>${{ number_format($item['price'] * $item['quantity'],2) }}</td>
                                    {{--                                    <td>{{ $item['quantity'] }}</td>--}}
                                    <td data-th="Quantity" style="width: 0px">
                                        <form action="{{ route('shop.update.item.cart',$id) }}" method="GET">
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <input type="number" min="1" value="{{ $item['quantity'] }}" name="quantity"
                                                   id="update-cart" class="form-control quantity"/>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('shop.remove.item.cart',$id) }}" class="btn btn-danger"><i
                                                class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-sm-4 p-3 proceed form">
                    <div class="row m-0">
                        <div class="col-sm-8 p-0">
                            <h6>Subtotal</h6>
                        </div>
                        <div class="col-sm-4 p-0">
                            <p id="subtotal">${{ number_format($subTotal,2) }}</p>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-sm-8 p-0 ">
                            <h6>Delivery Charges</h6>
                        </div>
                        <div class="col-sm-4 p-0">
                            <p id="tax">${{ getDeliveryCharges() }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mx-0 mb-2">
                        <div class="col-sm-8 p-0 d-inline">
                            <h5>Total</h5>
                        </div>
                        <div class="col-sm-4 p-0">
                            <p id="total">${{ number_format($subTotal + getDeliveryCharges(), 2) }}</p>
                        </div>
                    </div>

                    <a id="btn-checkout"
                       class="btn btn-main w-100 @if(!count((array) session('cart')) > 0) disabled @endif"
                       href="{{ route('shop.checkout') }}"><span>Checkout</span></a>
                    {{--                    <a href="{{ route('shop.checkout') }}"><button id="btn-checkout" class="btn btn-main w-100 @if(session('cart') && count((array) session('cart')) > 0) @endif"><span>Checkout</span></button></a>--}}
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('change', '#update-cart', function () {
                this.form.submit();
            });
        });
    </script>
@endsection

