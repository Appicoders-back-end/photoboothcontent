@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Orders
                    </header>
                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Video</th>
                                        <th>Images</th>
                                        <th>Documents</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $coupon)
                                    <tr class="gradeX">
                                        <td>{{ $coupon->name ?? '-' }}</td>
                                        <td>{{ $coupon->price ?? '-' }}</td>
                                        <td>{{ $coupon->number_of_video ?? 'N/A' }}</td>
                                        <td>{{ $coupon->number_of_images ?? 'N/A' }}</td>
                                        <td>{{ $coupon->number_of_documents ?? 'N/A' }}</td>
                                        <td>
                                            @if($coupon->status == "active")
                                                <span class="text-success">{{ ucwords($coupon->status) }}</span>
                                            @else
                                                <span class="text-danger">{{ ucwords($coupon->status) }}</span>
                                            @endif
                                        </td>
                                        <td>{{ date('F d, Y', strtotime($coupon->created_at))??'-'}} </td>
                                        <td>
                                            <a href="{{ route('admin.coupons.edit',$coupon->id) }}"
                                               class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
