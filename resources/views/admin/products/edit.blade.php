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
                    <div class="card-header">Update Product</div>

                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <form class="needs-validation" action="{{route('admin.product.update',$product->id)}}" method="POST" novalidate enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Title</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="title" placeholder="Product Title" value="{{ $product->title }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Price</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="price">$</span>
                                          </div>
                                          <input type="text" class="form-control" placeholder="Product Price" aria-label="price" aria-describedby="price" value="{{ $product->price }}" name="price" required>
                                        </div>
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <!--Summernote start-->
                                <div class="col-md-12 mb-3">
                                    <section class="card">
                                        <header class="card-header head-border editor-title">
                                            Description
                                        </header>
                                        <div class="card-body editor-desc">
                                            {{--                                                <div class="summernote"></div>--}}
                                            <textarea class="summernote" name="description" id="summernote_1">{{ $product->description??'' }}</textarea>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Image</label>
                                    <input type="file" class="dropify"  name="image[]" multiple/>
                                </div>
                                <div class="col-md-12 mb-3">
                                    @if($product->images)
                                    <div class="split" style="display: grid;grid-template-columns: repeat(5,1fr);grid-column-gap: 5px;grid-row-gap: 5px;">
                                        @foreach($product->images as $image)
                                        <div class="col-md-6">
                                            <img src="{{ url('storage/'.$image->image) }}" style="width:80px;height:80px;" class="me-4 border mb-2">
                                            <a href="{{ route('admin.product.image.destroy',$image->id) }}" class="d-block text-center">Delete</a>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                                <!--Summernote end-->
                            </div>
                            <button class="btn btn-primary" type="submit">Update Product</button>
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


