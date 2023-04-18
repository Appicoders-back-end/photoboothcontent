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
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <div class="card-header">Edit Content Store Video</div>
                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <form class="needs-validation" action="{{route('admin.content_videos.update',$content->id)}}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$content->id}}">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter name" value="{{old('name',$content->name)}}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="categories">Category</label>
                                    <select class="form-control mb-2" id="categories" name="category_id" required>
                                        <option selected disabled>Select Category</option>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{$category->id}}" {{$category->id == $content->category_id ? 'selected' : null}}>{{$category->name}}</option>
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
                                            <textarea class="form-control" rows="8" name="description"
                                                      id="summernote_1">{!! old('description', $content->description) !!}</textarea>
                                        </div>
                                    </section>
                                </div>
                                <!--Summernote end-->

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">status</label>
                                    <select class="form-control mb-2" name="status">
                                        <option value="active" @if($content->status == "active") selected @endif>
                                            Active
                                        </option>
                                        <option value="inactive" @if($content->status == "inactive") selected @endif>
                                            InActive
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Thumbnail Image</label>
                                    @if($content->thumbnail_image)
                                        <input
                                            type="file" class="dropify" name="thumbnail_image"
                                            data-default-file="{{ $content->getThumbnailImage() }}"
                                            data-max-file-size="10M"
                                            data-allowed-file-extensions="jpg jpeg png" data-show-remove="false"/>
                                    @else
                                        <input type="file" class="dropify" name="thumbnail_image" data-max-file-size="10M"
                                               data-allowed-file-extensions="jpg jpeg png" data-show-remove="false"/>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Video</label>
                                    @if($content->image)
                                        <input type="file" class="dropify" name="attachment"
                                               data-default-file="{{ $content->getImage() }}" data-max-file-size="100M"
                                               data-allowed-file-extensions="mp4 mpg flv avi" data-show-remove="false"/>
                                    @else
                                        <input type="file" class="dropify" name="attachment" data-max-file-size="100M"
                                               data-allowed-file-extensions="mp4 mpg flv avi" data-show-remove="false"/>
                                    @endif
                                </div>
                            </div>
                            <button class="btn btn-sm btn-success" type="submit">Update</button>
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
    </script>
@endsection

