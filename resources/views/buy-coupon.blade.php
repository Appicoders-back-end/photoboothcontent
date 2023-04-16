@extends('layouts.app')
@section('content')
    <main id="cart" class="mx-auto" style="max-width:960px; margin-top: 100px; padding: 100px 0;">
        <h2>Buy Coupon</h2>

        <div class="container-fluid">
            <div class="row align-items-start">
                @include('layouts.messages')
                <div class="col-12 col-sm-8 items">
                    <div class="cartItem row align-items-start">
                        <div class="col-5 mb-2">
                            <h5 class="">{{$coupon->name}}</h5>
                            <p class="pl-1 mb-0">{{ $coupon->number_of_video??'' }} Videos</p>
                            <p class="pl-1 mb-0">{{ $coupon->number_of_images??'' }} Images</p>
                            <p>{{ $coupon->number_of_documents??'' }} Document</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 p-3 proceed form">
                    <div class="row mb-3">
                        <div class="col-12">
                            <select name="payment_method" class="form-select mb-3"
                                    aria-label=".form-select-lg example" form="checkout-form">
                                <option value="" selected>Select payment method</option>
                                @foreach($payment_methods as $payment_method)
                                    <option value="{{$payment_method->id}}">{{$payment_method->card_holder_name}}
                                        - {{$payment_method->card_end_number}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <input type="text" id="promo_code" name="promo_code" id="payment-method-drp"
                                   class="form-control mb-3"
                                   placeholder="Promo Code">
                        </div>
                        <div class="col-4">
                            <a class="btn btn-main" id="applyPromoBtn"><span>Apply</span></a>
                        </div>

                        <div class="col-12">
                            <div class="alert alert-danger d-none" id="promoFailedMessage">
                            </div>

                            <div class="alert alert-success d-none" id="promoSuccessMessage">
                            </div>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-sm-8 p-0">
                            <h6>Subtotal</h6>
                        </div>
                        <div class="col-sm-4 p-0">
                            <p id="subtotal">${{$coupon->price}}</p>
                        </div>
                    </div>
                    <div class="row m-0 d-none" id="discount_div">
                        <div class="col-sm-8 p-0">
                            <h6>Discount</h6>
                        </div>
                        <div class="col-sm-4 p-0">
                            <p id="discount"></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mx-0 mb-2">
                        <div class="col-sm-8 p-0 d-inline">
                            <h5>Total</h5>
                        </div>
                        <div class="col-sm-4 p-0">
                            <p id="total">${{$coupon->price}}</p>
                        </div>
                    </div>
                    <a class="btn btn-main w-100"
                       onclick="event.preventDefault(); document.getElementById('checkout-form').submit();"><span>Checkout</span></a>

                    <form id="checkout-form" action="{{ route('buyCoupon') }}" method="POST" class="d-none">
                        @csrf
                        <input type="hidden" name="coupon_id" value="{{$coupon->id}}">
                        <input type="hidden" id="promo_code_id" name="promo_code_id" value="">
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script>
        $('#applyPromoBtn').on('click', function () {
            var url = "{{ url('api/applyCouponPromo') }}";
            var promo_code = $('#promo_code').val();
            var coupon_id = {{ $coupon->id }};
            $.post(url, {promo_code: promo_code, coupon_id: coupon_id}, function (e) {
                console.log(e)
                if (e.success) {

                    $('#discount_div').removeClass('d-none');
                    $('#promoSuccessMessage').removeClass('d-none').text(e.message);
                    $('#promoSuccessMessage').removeClass('d-none').text(e.message);

                    $('#discount').text("- $" + e.data.discount);
                    $('#total').text("$" + e.data.total);
                    $('#promo_code_id').val(e.data.promo_code_id);
                    $('#applyPromoBtn').addClass("disabled")

                } else {
                    $('#promoSuccessMessage').addClass('d-none');
                    $('#promoFailedMessage').removeClass('d-none').text(e.message);
                }
            });
        });
    </script>
@endsection
