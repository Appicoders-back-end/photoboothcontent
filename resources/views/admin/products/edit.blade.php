@extends('admin.layouts.app')
@section('style')
    {{--    <link href="{{asset('admin_assets')}}/css/dropify.css" rel="stylesheet">--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet"/>
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
                    <div class="card-header">Update Product</div>

                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <form class="needs-validation" id="productForm" action="{{route('admin.product.update',$product->id)}}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        </form>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="name">Title</label>
                                    <input id="name" type="text" class="form-control" id="validationCustom01" name="title"
                                           placeholder="Product Title" value="{{ $product->title }}" required form="productForm">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="price">Price</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input id="price" name="price" type="number" class="form-control" min="1"
                                                   placeholder="Product Price" aria-label="price"
                                                   aria-describedby="price" value="{{ $product->price }}" name="price"
                                                   required form="productForm">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="stock">Stock</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input id="stock" type="number" class="form-control" min="1" placeholder="Stock"
                                                   aria-label="stock" aria-describedby="stock"
                                                   value="{{ $product->stock }}" name="stock" required form="productForm">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="status">Status</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <select id="status" name="status" class="form-control" form="productForm">
                                                <option value="active">Active</option>
                                                <option value="inactive">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!--Summernote start-->
                                <div class="col-md-12 mb-3">
                                    <section class="card">
                                        <header class="card-header head-border editor-title">
                                            Description
                                        </header>
                                        <div class="card-body editor-desc">
                                            <textarea class="summernote" name="description"
                                                      id="summernote_1" form="productForm">{{ $product->description??'' }}</textarea>
                                        </div>
                                    </section>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="product_images">Images</label>
                                    <div class="form-group">
                                        <form method="POST"
                                              class="dropzone" id="product_images">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                <!--Summernote end-->
                            </div>
                            <button class="btn btn-sm btn-success" type="submit" form="productForm">Update Product</button>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
@section('script')
    {{--    <script src="{{asset('admin_assets')}}/js/dropify.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    <!--summernote-->
    <script src="{{asset('admin_assets')}}/assets/summernote/summernote-bs4.min.js"></script>

    <script>
        var uploadedDocumentMap = {}
        Dropzone.autoDiscover = false;
        Dropzone.options.documentDropzone = new Dropzone("#product_images", {
            url: "{{ route('dropzone.store') }}",
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            dictRemoveFile: "Remove file",
            dictRemoveFileConfirmation: null,

            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                console.log(file, file.upload.uuid)
                $('#productForm').append('<input type="hidden" name="images[]" value="' + response.path + '" data-uuid="' + file.upload.uuid + '">')
                uploadedDocumentMap[file.upload.filename] = response.name
            },
            removedfile: function (file) {
                console.log(file);
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('#productForm').find('input[name="images[]"][data-uuid="' + file.upload.uuid + '"]').remove()
                // var _ref;
                // return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },
            init: function () {
                @if(isset($product) && $product->images->count() > 0)
                var files = {!! json_encode($product->images) !!}

                    console.log(files);
                for(var i in files)
                {
                    var file = files[i]
                    console.log(file)
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('#productForm').append('<input type="hidden" name="images[]" value="' + file.image + '">')
                }
                @endif
            }
        });
    </script>

    <script>
        /*$(document).ready(function () {
            $('.dropify').dropify();
        });*/

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


