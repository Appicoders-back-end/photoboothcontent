@extends('admin.layouts.app')
@section('style')
    {{--<link href="{{asset('admin_assets')}}/css/dropify.css" rel="stylesheet">--}}
    {{--<link href="{{asset('admin_assets')}}/assets/dropzone/css/dropzone.css" rel="stylesheet"/>--}}

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

        .dropify-preview {
            overflow-y: scroll !important;
        }

        /*.dropify-preview img{
            width: 200px;
            height: 150px;
            object-fit: cover;
            margin: 0 20px;
            margin-bottom: 45px;
        }
        .dropify-wrapper .dropify-preview{
            overflow: auto;
        }*/
    </style>
@endsection
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <div class="card-header">Create Product</div>
                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <form class="needs-validation productForm" id="productForm"
                              action="{{route('admin.product.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                        </form>
                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Title</label>
                                <input type="text" class="form-control" id="validationCustom01" name="title"
                                       placeholder="Product Title" value="{{old('title')}}" required form="productForm">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Price</label>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="price">$</span>
                                        </div>
                                        <input type="number" class="form-control" min="1"
                                               placeholder="Product Price" aria-label="price"
                                               aria-describedby="price" value="{{old('price')}}" name="price"
                                               id="price" required form="productForm">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Stock</label>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" placeholder="Stock" min="1"
                                               aria-label="stock" aria-describedby="stock" value="{{old('stock')}}"
                                               name="stock" required form="productForm">
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
                                                      id="summernote_1"
                                                      form="productForm">{{old('description')}}</textarea>
                                    </div>
                                </section>
                            </div>
                            <!--Summernote end-->

                            <div class="col-md-12 mb-3">
                                {{-- <label for="validationCustom02">Image</label>
                                 <input type="file" class="dropify" id="gallery-photo-add" name="image[]" multiple required />--}}
                                <label for="validationCustom01">Images</label>
                                <div class="form-group">
                                    <form method="POST"
                                          class="dropzone" id="my-awesome-dropzone">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                            <button class="btn btn-sm btn-success" type="submit" form="productForm">Create Product
                            </button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
@section('script')
    {{-- <script src="{{asset('admin_assets')}}/js/dropify.js"></script>--}}
    {{-- <script src="{{asset('admin_assets')}}/assets/dropzone/dropzone.js"></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <!--summernote-->
    <script src="{{asset('admin_assets')}}/assets/summernote/summernote-bs4.min.js"></script>

    <script>
        var uploadedDocumentMap = {}
        Dropzone.autoDiscover = false;
        Dropzone.options.documentDropzone = new Dropzone("#my-awesome-dropzone", {
            url: "{{ route('dropzone.store') }}",
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            dictRemoveFile: "Remove file",
            dictRemoveFileConfirmation: null,

            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('#productForm').append('<input type="hidden" name="images[]" value="' + response.path + '" data-uuid="' + file.upload.uuid + '">')
                uploadedDocumentMap[file.upload.filename] = response.name
                file.upload.path = response.path
            },
            removedfile: function (file) {
                console.log(file)
                /*file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('#productForm').find('input[name="images[]"][data-uuid="' + file.upload.uuid + '"]').remove();*/

                // var _ref;
                // return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

                var name = '';
                if (file.upload) {
                    name = file.upload.path;
                } else {
                    name = file.image;
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    type: 'POST',
                    url: "{{ route('admin.product.image.destroy') }}",
                    data: {name: name},
                    success: function (data) {
                        alert(data.message);
                        file.previewElement.remove();
                        $('#productForm').find('input[name="images[]"][data-uuid="' + file.upload.uuid + '"]').remove();
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
            },
            init: function () {
            }
        });
    </script>
    <script>
        /*$(document).ready(function () {
            $('.dropify').dropify();
        });*/

        $(document).ready(function () {

            $(".select2").select2();

            /*content editor*/
            $('.summernote').summernote({
                height: 200,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                 // set focus to editable area after initializing summernote
            });
        });
    </script>
@endsection


