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
        .myloader {
            z-index: 1;
            position: fixed;
            min-height: 100vh;
            top: 0;
            background-image: url("https://cdn.dribbble.com/users/255512/screenshots/2215917/animation.gif");
            background-repeat: no-repeat;
            background-position: center;
        }

        .pageContents {
            position: fixed;
            min-height: 100vh;
            top: 0;
        }
    </style>
@endsection
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <div class="card-header">Create Content Store Video</div>
                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <form class="needs-validation" action="{{route('admin.content_videos.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="{{\App\Models\Content::VIDEO}}">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter name" value="{{old('name')}}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="categories">Category</label>
                                    <select class="form-control mb-2" id="categories" name="category_id" id="categories" required>
                                        <option selected disabled>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!--Summernote start-->
                                <div class="col-md-12">
                                    <section class="card">
                                        <header class="card-header head-border editor-title">
                                            Description
                                        </header>
                                        <div class="card-body editor-desc">
                                            <textarea class="form-control"  name="description" id="summernote_1" rows="8"></textarea>
                                        </div>
                                    </section>
                                </div>
                                <!--Summernote end-->

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">status</label>
                                    <select class="form-control mb-2" id="status" name="status" required>
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">InActive</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Thumbnail Image</label>
                                    <input type="file" name="thumbnail_image" class="dropify" data-max-file-size="10M"
                                           data-allowed-file-extensions="jpg jpeg png" data-show-remove="false">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Watermark Video</label>
                                    <input type="file" name="watermark_attachment" class="dropify" data-max-file-size="100M"
                                           data-allowed-file-extensions="mp4 mpg flv avi" data-show-remove="false">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Downloadable Video</label>
                                    <input type="file" name="attachment" class="dropify" data-max-file-size="100M"
                                           data-allowed-file-extensions="mp4 mpg flv avi" data-show-remove="false">
                                </div>
                            </div>
                            <button class="btn btn-sm btn-success" id="upload-video" type="submit">Save</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <div class="myloader container-fluid " style="display: none">
        </div>

        </div>
        <!-- page end-->
    </section>
@endsection
@section('script')
    <script src="{{asset('admin_assets')}}/js/dropify.js"></script>
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

        $("#upload-video").on("click",function (e) {
            // e.preventDefault();
            var name = $("#name").val();
            var categories = $("#categories").val();
            var summernote_1 = $("#summernote_1").val();
            var status = $("#status").val();
            if(name !== '' && categories !== '' && summernote_1 !== '' && status !== ''){
                $(".myloader").css("display","block");
            }

            // $("form").submit();
            // alert('work')
        })
    </script>
@endsection

