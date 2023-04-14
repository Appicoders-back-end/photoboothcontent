@extends('admin.layouts.app')
@section('style')
    <!--  summernote -->
    <link href="{{asset('admin_assets')}}/assets/summernote/summernote-bs4.css" rel="stylesheet">
    <style>
        .editor-title{
            padding: 0 0 10px 0 !important;
        }
        .editor-desc{
            padding: 0 0 0 0 !important;
            margin-bottom: 0 !important;
        }

    </style>
@endsection
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

                                <!--Summernote start-->
                                <div class="col-md-12 mb-3">
                                    <section class="card">
                                        <header class="card-header head-border editor-title">
                                            Description
                                        </header>
                                        <div class="card-body editor-desc">
                                            {{--                                                <div class="summernote"></div>--}}
                                            <textarea class="summernote" name="description" id="summernote_1">{{ $coupon->description }}</textarea>
                                        </div>
                                    </section>
                                </div>
                                <!--Summernote end-->
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
@section('script')
    <!--summernote-->
    <script src="{{asset('admin_assets')}}/assets/summernote/summernote-bs4.min.js"></script>

    <script>

        $(document).ready(function () {
            $('.summernote').summernote({
                height: 200,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                 // set focus to editable area after initializing summernote
            });
        });

    </script>
@endsection


