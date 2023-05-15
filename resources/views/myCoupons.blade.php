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
                                            <table class="table text-center borderless">
                                                <tr>
                                                    <td>Photo</td>
                                                    <td>Video</td>
                                                    <td>Document</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$coupon->total_images}}</td>
                                                    <td>{{$coupon->total_videos}}</td>
                                                    <td>{{$coupon->total_documents}}</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table class="table text-center borderless">
                                                <tr>
                                                    <td>Photo</td>
                                                    <td>Video</td>
                                                    <td>Document</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$coupon->downloaded_images}}</td>
                                                    <td>{{$coupon->downloaded_videos}}</td>
                                                    <td>{{$coupon->downloaded_documents}}</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td class="text-success fw-bold" style="white-space: nowrap">{{$coupon->subscription_id ? "Purchased via subscription" : '$'.$coupon->price}}</td>
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
