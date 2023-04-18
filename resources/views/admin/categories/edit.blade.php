@extends('admin.layouts.app')
@section('style')
    <link href="{{asset('admin_assets')}}/css/dropify.css" rel="stylesheet">
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
                    <div class="card-header">Update Category</div>

                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <form class="needs-validation" action="{{route('admin.categories.update',$category->id)}}" method="POST" novalidate enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Name</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="category name" value="{{ $category->name }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Parent Category</label>
                                    <select class="form-control mb-2" name="parent_id">
                                        <option value="" selected disabled>Select Category</option>
                                        @forelse($categories as $cat)
                                            <option value="{{ $cat->id }}" @if($cat->id == $category->parent_id) selected @endif>{{ $cat->name??'-' }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">status</label>
                                    <select class="form-control mb-2" name="status">
                                        <option value="active" @if($category->status == "active") selected @endif>
                                            Active
                                        </option>
                                        <option value="inactive" @if($category->status == "inactive") selected @endif>
                                            InActive
                                        </option>
                                    </select>
                                </div>

                                <!--Summernote start-->
                               {{-- <div class="col-md-12 mb-3">
                                    <section class="card">
                                        <header class="card-header head-border editor-title">
                                            Description
                                        </header>
                                        <div class="card-body editor-desc">
                                            --}}{{--                                                <div class="summernote"></div>--}}{{--
                                            <textarea class="summernote" name="description" id="summernote_1">{{ $category->description??'' }}</textarea>
                                        </div>
                                    </section>
                                </div>--}}
                                <!--Summernote end-->

                                {{--<div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Image</label>
                                    @if($category->image)
                                        <input type="file" class="dropify" name="image"
                                               data-default-file="{{ $category->getImage() }}"/>
                                    @else
                                        <input type="file" class="dropify" name="image"/>
                                    @endif
                                </div> --}}
                            </div>
                            <button class="btn btn-sm btn-success" type="submit">Update Category</button>
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

    </script>
@endsection


