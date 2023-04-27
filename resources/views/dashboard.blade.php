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
                        <p class="card-text"><strong>Name:</strong> {{ $user->name ?? '-' }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $user->email ?? '-' }}</p>
                        <p class="card-text"><strong>Phone:</strong> {{ $user->contactNo() ?? '-'}}</p>
                        <p class="card-text">
                            <strong>Membership:</strong> {{ $userSubcription->subscription->name??'-' }} </p>
                        <p class="card-text"><strong>Membership
                                Due:</strong> {{ $user->userSubcription->count() > 0 ? formattedDate($user->userSubcription()->first()->end_date) : '-'}}
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
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Card Holder Name</th>
                                    <th>Card End Number</th>
                                    <th>Card Brand</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($paymentMethods as $paymentMethod)
                                    <tr>
                                        <td>{{ $paymentMethod->card_holder_name??'' }}</td>
                                        <td>{{ $paymentMethod->card_end_number??'' }}</td>
                                        <td>{{ $paymentMethod->card_brand??'' }}</td>
                                        <td>
                                            <form action="{{ route('payment-methods.destroy',$paymentMethod->id) }}"
                                                  method="POST">
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
        </div>
    </div>
@endsection
