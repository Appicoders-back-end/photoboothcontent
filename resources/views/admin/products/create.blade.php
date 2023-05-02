@extends('admin.layouts.app')
@section('style')
{{--    <link href="{{asset('admin_assets')}}/css/dropify.css" rel="stylesheet">--}}

    <link href="{{asset('admin_assets')}}/assets/dropzone/css/dropzone.css" rel="stylesheet"/>

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
        .dropify-preview{
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
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible" style="text-align:center;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                <strong>Success!</strong>
                                <?= htmlentities(Session::get('success'))?>
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible" style="text-align:center;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                <strong>Error!</strong>
                                <?= htmlentities(Session::get('error'))?>
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible" style="text-align:center;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                <p><strong>Whoops!</strong> Please correct errors and try again!</p>
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif
                        <form class="needs-validation" id="form" action="{{route('admin.product.store')}}" method="POST" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">Title</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="title" placeholder="Product Title" value="{{old('title')}}" required>
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
                                          <input type="number" class="form-control" min="1" placeholder="Product Price" aria-label="price" aria-describedby="price" value="{{old('price')}}" name="price" id="price" required>
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
{{--                                            <div class="input-group-prepend">--}}
{{--                                                <span class="input-group-text" id="price">$</span>--}}
{{--                                            </div>--}}
                                            <input type="number" class="form-control" placeholder="Stock" min="1" aria-label="stock" aria-describedby="stock" value="{{old('stock')}}" name="stock" required>
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
                                                <textarea class="summernote" name="description" id="summernote_1">{{old('description')}}</textarea>
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
                                        <form action="http://thevectorlab.net/flatlab-4/assets/dropzone/upload.php" class="dropzone" id="my-awesome-dropzone"></form>
                                    </div>

                                </div>
                                <div class="gallery"></div>
                            </div>
                            <button class="btn btn-sm btn-success" type="submit">Create Product</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
@section('script')
{{--    <script src="{{asset('admin_assets')}}/js/dropify.js"></script>--}}
    <script src="{{asset('admin_assets')}}/assets/dropzone/dropzone.js"></script>
    <!--summernote-->
    <script src="{{asset('admin_assets')}}/assets/summernote/summernote-bs4.min.js"></script>

    <script type="text/javascript">
        var uploadedDocumentMap = {}
        console.log(Dropzone.options.documentDropzone)
        Dropzone.options.documentDropzone = {
            url: "",
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function () {
                    @if(isset($project) && $project->document)
                var files =
                {!! json_encode($project->document) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                }
                @endif
            }
        }
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

        $(document).ready(function () {
            // alert('working');
            $('.parent_category_option').on('change', function (e) {
               /* var optionSelected = $("option:selected", this);
                var valueSelected = this.value;*/
                $(".child_category_option").css("display","none");
                var el = $('.status_option');
                el.addClass('col-md-12 mb-3');
                el.removeClass('col-md-6 mb-3');
            });
        });

        $(function() {
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
                // alert('work 1')
                // $(".dropify-wrapper input").css("z-index","0");
                imagesPreview(this, 'div.dropify-preview');
                imagesPreview(this, 'div.dropify-preview').css("overflow-y","auto");
                imagesPreview(this, 'div.dropify-preview .dropify-render').css("display","none");

            });
        });

        $(document).on("click",".dropify-preview",function () {
            // alert('work 2');
            $(".dropify-wrapper input").css("z-index","5");
            $( "#gallery-photo-add" ).trigger( "click" );
        });


    </script>
@endsection


