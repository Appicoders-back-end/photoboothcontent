@extends('layouts.app')
@section('content')
    <div class="container dashboard-container">
        <a href="{{ route('payment-methods.create') }}" class="btn btn-main">Add payment method</a>
        @include('layouts.messages')
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
                                    <th>Card Holder Name</th>
                                    <th>Card End Number</th>
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
