@extends('layouts.app')
@section('content')
    <div class="container dashboard-container">
        <div class="row mt-5">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">My coupons</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                <tr>
                                    <th>Coupon Name</th>
                                    <th>Coupon Code</th>
                                    <th>Total Limits</th>
                                    <th>Download Consumed</th>
                                    <th>Coupon Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coupons as $coupon)
                                    <tr>
                                        <td>{{$coupon->coupon ? $coupon->coupon->name : '-'}}</td>
                                        <td>{{$coupon->code}}</td>
                                        <td>
                                            <div class="row text-center">
                                                <div class="col-4">
                                                    <p>Photo</p>
                                                    <p>{{$coupon->total_images}}</p>
                                                </div>
                                                <div class="col-4">
                                                    <p>Video</p>
                                                    <p>{{$coupon->total_images}}</p>
                                                </div>
                                                <div class="col-4">
                                                    <p>Doc</p>
                                                    <p>{{$coupon->total_documents}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row text-center bg-secondary-subtle">
                                                <div class="col-4">
                                                    <p>Photo</p>
                                                    <p>{{$coupon->downloaded_images}}</p>
                                                </div>
                                                <div class="col-4">
                                                    <p>Video</p>
                                                    <p>{{$coupon->downloaded_videos}}</p>
                                                </div>
                                                <div class="col-4">
                                                    <p>Doc</p>
                                                    <p>{{$coupon->downloaded_documents}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-success fw-bold">{{$coupon->subscription_id ? "Purchased via subscription" : '$'.$coupon->price}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
