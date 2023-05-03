@extends('admin.layouts.app')
@section('style')
    {{--    <link href="{{asset('admin_assets')}}/css/dropify.css" rel="stylesheet">--}}
    {{--    <link href="{{asset('admin_assets')}}/assets/dropzone/css/dropzone.css" rel="stylesheet"/>--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet"/>
    {{--    <link href="{{asset('admin_assets')}}/css/dropify.css" rel="stylesheet">--}}
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
                        <form class="needs-validation productForm" id="productForm" action="{{route('admin.product.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                        </form>
                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Title</label>
                                <input type="text" class="form-control" id="validationCustom01" name="title"
                                       placeholder="Product Title" value="{{old('title')}}" required form="productForm">
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
                                        <input type="number" class="form-control" min="1"
                                               placeholder="Product Price" aria-label="price"
                                               aria-describedby="price" value="{{old('price')}}" name="price"
                                               id="price" required form="productForm">
                                    </div>
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
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
                                            <textarea class="summernote" name="description"
                                                      id="summernote_1" form="productForm">{{old('description')}}</textarea>
                                    </div>
                                </section>
                            </div>
                            <!--Summernote end-->

                            <div class="col-md-12 mb-3">
                                {{-- <label for="validationCustom02">Image</label>
                                 <input type="file" class="dropify" id="gallery-photo-add" name="image[]" multiple required />--}}

                                <header class="card-header">
                                    Dropzone File Upload
                                </header>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('dropzone.uploads') }}"
                                          class="dropzone" id="my-awesome-dropzone">
                                        @csrf
                                    </form>
                                    <!--Summernote end-->

                                    {{--                                <div class="col-md-12 mb-3">--}}
                                    {{--                                   <label for="validationCustom02">Image</label>--}}
                                    {{--                                    <input type="file" class="dropify" id="gallery-photo-add" name="image[]" multiple required />--}}

                                    {{--                                </div>--}}

                                </div>
                            </div>
                            <button class="btn btn-sm btn-success" type="submit" form="productForm">Create Product</button>

                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
@section('script')
    {{--    <script src="{{asset('admin_assets')}}/js/dropify.js"></script>--}}
    {{--    <script src="{{asset('admin_assets')}}/assets/dropzone/dropzone.js"></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <!--summernote-->
    <script src="{{asset('admin_assets')}}/assets/summernote/summernote-bs4.min.js"></script>

    <script>
        var uploadedDocumentMap = {}

        Dropzone.options.documentDropzone = new Dropzone("#my-awesome-dropzone" , {
            url: "{{ route('dropzone.store') }}",
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            dictRemoveFile:"Remove file",
            dictRemoveFileConfirmation:null,

            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },

            success: function (file, response) {
                console.log(file, response);
                $('#productForm').append('<input type="hidden" name="document[]" value="' + file.upload.filename + '">')
                uploadedDocumentMap[file.upload.filename] = response.name
            },
            removedfile: function (file) {

                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('#productForm').find('input[name="document[]"][value="' + file.upload.filename + '"]').remove()
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },
            init: function () {
                @if(isset($project) && $project->document)
                var files =
                    {!! json_encode($project->document) !!}
                    for(
                var i
            in
                files
            )
                {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('#productForm').append('<input type="hidden" name="document[]" value="' + file.upload.filename + '">')
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

        /*  $(function() {
              // Multiple images preview in browser
              var imagesPreview = function(input, placeToInsertImagePreview) {

                  if (input.files) {
                      var filesAmount = input.files.length;

                      for (i = 0; i < filesAmount; i++) {
                          var reader = new FileReader();

                          reader.onload = function(event) {
                              $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                          }

                          reader.readAsDataURL(input.files[i]);
                      }
                  }
              };

              $('#gallery-photo-add').on('change', function() {
                  imagesPreview(this, 'div.dropify-preview');
                  imagesPreview(this, 'div.dropify-preview').css("overflow-y","auto");
                  imagesPreview(this, 'div.dropify-preview .dropify-render').css("display","none");
              });
          });*/

        /*$(document).on("click",".dropify-preview",function () {
            // alert('work 2');
            $(".dropify-wrapper input").css("z-index","5");
            $( "#gallery-photo-add" ).trigger( "click" );
        });*/
    </script>
@endsection


