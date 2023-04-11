@extends('layouts.app')
@section('content')
    <div class="container dashboard-container">
        <div class="row mt-5">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Payment Methods</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Card#</th>
                                    <th>Expiry date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>#12345</td>
                                    <td>2022-03-25</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Payment Methods</h5>
                        <hr>
                        <form>
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber"
                                       placeholder="1234 5678 9012 3456">
                            </div>
                            <div class="mb-3">
                                <label for="cardName" class="form-label">Name on Card</label>
                                <input type="text" class="form-control" id="cardName" placeholder="John Doe">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="expiryDate" class="form-label">Expiry Date</label>
                                    <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cvv" placeholder="123">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-main">Add payment method</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
