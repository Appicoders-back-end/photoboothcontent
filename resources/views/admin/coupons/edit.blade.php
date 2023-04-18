@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <div class="card-header">Update Coupon</div>

                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <form class="needs-validation" action="{{route('admin.coupons.update',$coupon->id)}}" method="POST" novalidate enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Name</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="name" placeholder=" name" value="{{ $coupon->name }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                             {{--   <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Code</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="code" placeholder=" code" value="{{ $coupon->code }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>--}}

                                <div class="col-md-6 mb-3">
                                    <label for="amount">Price</label>
                                    <input type="number" class="form-control" id="amount" name="price"
                                           placeholder="price" value="{{ $coupon->price }}" required step="any">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="amount">Total Coupon Video</label>
                                    <input type="number" class="form-control" id="video" name="number_of_video"
                                           placeholder="video" value="{{ $coupon->number_of_video }}" required step="any">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="amount">Total Coupon Images</label>
                                    <input type="number" class="form-control" id="amount" name="number_of_images"
                                           placeholder="images" value="{{ $coupon->number_of_images }}" required step="any">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="amount">Total Coupon Documents</label>
                                    <input type="number" class="form-control" id="amount" name="number_of_documents"
                                           placeholder="documents" value="{{ $coupon->number_of_documents }}" required step="any">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">coupon status</label>
                                    <select class="form-control mb-2" name="status">
                                        <option value="active" @if($coupon->status == "active") selected @endif>
                                            Active
                                        </option>
                                        <option value="inactive" @if($coupon->status == "inactive") selected @endif>
                                            InActive
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-success" type="submit">Update Coupon</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection

