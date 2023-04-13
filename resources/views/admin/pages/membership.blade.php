@extends('admin.layouts.app')
@section('style')
    <link href="{{asset('admin_assets')}}/css/dropify.css" rel="stylesheet">
    <!--  summernote -->
    <link href="{{asset('admin_assets')}}/assets/summernote/summernote-bs4.css" rel="stylesheet">
    <style>
        .editor-title {
            padding: 0 0 10px 0 !important;
        }

        .editor-desc {
            padding: 0 0 0 0 !important;
            margin-bottom: 0 !important;
        }
    </style>
@endsection
@section('content')
    <section class="wrapper">
        @if(Session::has('success') || Session::has('error') || $errors->any())
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <div class="card-body">
                            @include('admin.layouts.messages')
                        </div>
                    </section>
                </div>
            </div>
        @endif

        <form class="needs-validation" action="{{route('admin.storeMembershipPage')}}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$membership->id}}">
            <input type="hidden" name="old_image" value="{{ ($content) ? $content->membershipImg : '' }}">
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header">
                            Hero Section (Header)
                            <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                          </span>
                        </header>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="sub_heading">Sub Heading</label>
                                    <input type="text" class="form-control" id="sub_heading"
                                           name="sub_heading"
                                           placeholder="Enter Sub Heading" value="{{old('sub_heading', $content->sub_heading ?? null)}}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="heading">Heading</label>
                                    <input type="text" class="form-control" id="heading"
                                           name="heading"
                                           placeholder="Enter Heading" value="{{old('heading', $content->heading ?? null)}}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description"
                                              id="description" cols="30"
                                              rows="10">{!! old('description', $content->description ?? null) !!}</textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Image</label>
                                    <input type="file" class="dropify" name="membership_image"
                                           data-max-file-size="10M"
                                           data-allowed-file-extensions="jpg jpeg png"
                                           data-show-remove="false"
                                           @if(isset($content->membershipImg))
                                               data-default-file="{{ url('/') . '/' . $content->membershipImg }}"
                                           @endif
                                    />
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="membership_button_text">Button Text</label>
                                    <input type="text" class="form-control" id="membership_button_text"
                                           name="membership_button_text"
                                           placeholder="Enter Button Text"
                                           value="{{old('membership_button_text', $content->membership_button_text ?? null)}}">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <div class="card-body">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </section>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('script')
    <script src="{{asset('admin_assets')}}/js/dropify.js"></script>
    <!--summernote-->
    <script src="{{asset('admin_assets')}}/assets/summernote/summernote-bs4.min.js"></script>

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

        $(document).ready(function () {
            // alert('working');
            $('.parent_category_option').on('change', function (e) {
                /* var optionSelected = $("option:selected", this);
                 var valueSelected = this.value;*/
                $(".child_category_option").css("display", "none");
                var el = $('.status_option');
                el.addClass('col-md-12 mb-3');
                el.removeClass('col-md-6 mb-3');
            });
        });
    </script>
@endsection


