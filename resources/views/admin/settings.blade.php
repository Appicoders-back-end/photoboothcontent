@extends('admin.layouts.app')
@section('style')
    <link href="{{asset('admin_assets')}}/css/dropify.css" rel="stylesheet">
    <link href="{{asset('admin_assets')}}/assets/summernote/summernote-bs4.css" rel="stylesheet">
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
                                    <label for="contact_no">Contact</label>
                                    <input type="text" class="form-control" name="contact" id="contact_no"
                                           placeholder="Enter contact" value="{{ $contact ?? '' }}" minlength="10" maxlength="10" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                           placeholder="Enter email" value="{{ $email??'' }}" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address"
                                           placeholder="Enter address" value="{{ $address??'' }}" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="description">Footer Description</label>
                                    <textarea id="description" class="form-control summernote" name="footer_description" rows="6">{{ $footer_description??'' }}</textarea>
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
                            <button class="btn btn-success" type="submit">Save</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
@section('script')
    <script src="{{asset('admin_assets')}}/assets/summernote/summernote-bs4.min.js"></script>
    <script src="{{asset('admin_assets')}}/js/dropify.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });

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
