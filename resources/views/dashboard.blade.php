@extends('layouts.app')
@section('content')
    <div class="container dashboard-container">
        @include('layouts.messages')
        <div class="row mt-5">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Profile</h5>
                        <hr>
                        <p class="card-text"><strong>Name:</strong>{{ $user->name??'-' }}</p>
                        <p class="card-text"><strong>Email:</strong>{{ $user->email??'-' }}</p>
                        <p class="card-text"><strong>Phone:</strong> {{ $user->contact_no??'-' }}</p>
                        <p class="card-text"><strong>Membership:</strong> {{ $userSubcription->subscription->name??'-' }} </p>
                        <p class="card-text"><strong>Membership
                                Due:</strong> {{ $user->userSubcription->count() > 0 ? $user->userSubcription()->first()->end_date : '-'}}
                        </p>
                        <a href="{{ route('edit-profile') }}" class="btn btn-main">Edit Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Payment Methods</h5>
                        <hr>
{{--                        @include('layouts.messages')--}}
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Card Holder Name</th>
                                    <th>Card end Number</th>
                                    <th>Card Brand</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{-- <tr>
                                     <td>#12345</td>
                                     <td>2022-03-25</td>
                                     <td>
                                         <a href="#" class="btn btn-primary">Edit</a>
                                         <a href="#" class="btn btn-danger">Delete</a>
                                     </td>
                                 </tr>--}}
                                @forelse($paymentMethods as $paymentMethod)
                                    <tr>
                                        <td>{{ $paymentMethod->card_holder_name??'' }}</td>
                                        <td>{{ $paymentMethod->card_end_number??'' }}</td>
                                        <td>{{ $paymentMethod->card_brand??'' }}</td>
                                        <td>
                                            <form action="{{ route('payment-methods.destroy',$paymentMethod->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"> Delete</button>
                                            </form>
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
            {{--<div class="col-lg-6 mb-4">
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
            </div>--}}
            {{-- <div class="col-lg-12 mb-4">
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
                                     <th>Payment Method</th>
                                     <th>Order Total</th>
                                     <th>Status</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                 <tr>
                                     <td>#12345</td>
                                     <td>2022-03-25</td>
                                     <td>Credit Card</td>
                                     <td>$125.00</td>
                                     <td>Delivered</td>
                                 </tr>
                                 <tr>
                                     <td>#12344</td>
                                     <td>2022-03-18</td>
                                     <td>PayPal</td>
                                     <td>$75.00</td>
                                     <td>Delivered</td>
                                 </tr>
                                 <tr>
                                     <td>#12343</td>
                                     <td>2022-03-12</td>
                                     <td>Debit Card</td>
                                     <td>$50.00</td>
                                     <td>Cancelled</td>
                                 </tr>
                                 <tr>
                                     <td>#12342</td>
                                     <td>2022-03-05</td>
                                     <td>Credit Card</td>
                                     <td>$100.00</td>
                                     <td>Delivered</td>
                                 </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>--}}
        </div>
    </div>
@endsection
