@extends('admin.layouts.app')
@section('style')
    <link href="{{asset('admin_assets')}}/css/dropify.css" rel="stylesheet">
@endsection
@section('content')
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <div class="card-header">General Settings</div>
                    <br>
                    @include('admin.layouts.messages')
                    <br>
                    <div class="card-body">
                        <form class="needs-validation" action="{{route('admin.storeSettings')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Contact</label>
                                    <input type="text" class="form-control" name="contact" id="validationCustom02" placeholder="enter contact" value="{{ $contact??'' }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Email</label>
                                    <input type="text" class="form-control" name="email" id="validationCustom02" placeholder="enter email" value="{{ $email??'' }}" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Address</label>
                                    <input type="text" class="form-control" name="address" id="validationCustom02" placeholder="enter address" value="{{ $address??'' }}" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="logo">Footer Description</label>
                                    <div class="card-body editor-desc">
                                        <textarea class="form-control" name="footer_description" id="summernote_1" rows="8">{{ $footer_description??'' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="logo">Logo</label>
                                    <input id="logo" type="file" class="dropify" name="logo"
                                           @if($logo)
                                               data-default-file="{{ $logo }}"
                                           @endif
                                           data-max-file-size="10M"
                                           data-allowed-file-extensions="jpg jpeg png"
                                    />
                                </div>

                            </div>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
@section('script')
    <script src="{{asset('admin_assets')}}/js/dropify.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });
    </script>
@endsection
