@extends('layouts.app')
@section('content')
    <div class="container dashboard-container">
        <div class="row mt-5">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    @include('layouts.messages')
                    <div class="card-body">
                        <h5 class="card-title">Add Payment Methods</h5>
                        <hr>
                        <div class="col-lg-12 mb-4">
                            <form action="{{ route('payment-methods.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="cardNumber" class="form-label">Card Number</label>
                                    <input type="text" class="form-control" name="card_number" id="cardNumber"
                                           placeholder="1234 5678 9012 3456" value="{{ old('card_number') }}"
                                           minlength="16" maxlength="16">
                                </div>
                                <div class="mb-3">
                                    <label for="cardName" class="form-label">Name on Card</label>
                                    <input type="text" class="form-control" id="cardName" name="card_holder_name"
                                           value="{{ old('card_holder_name') }}" placeholder="John Doe">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="expiryDate" class="form-label">Expiry Date</label>
                                        <input type="date" class="form-control" id="expiryDate" name="exp_date"
                                               value="{{ old('exp_date') }}" placeholder="MM/YY">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="cvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cvv" name="cvc"
                                               value="{{ old('cvc') }}" placeholder="123" minlength="3" maxlength="3">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-main">Add payment method</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
