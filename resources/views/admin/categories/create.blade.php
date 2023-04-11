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
                    <div class="card-header">Create Category</div>

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
                        <form class="needs-validation" action="{{route('admin.categories.store')}}" method="POST" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Name</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="category name" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Parent Category</label>
                                    <select class="form-control mb-2 parent_category_option" name="parent_id">
                                        <option value="" selected disabled>Select Category</option>
                                        @forelse($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name??'N/A' }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3 child_category_option">
                                    <label for="validationCustom02">Select Type</label>
                                    <select class="form-control mb-2" name="type">
                                        <option value="" selected disabled>Select Category</option>
                                        <option value="{{\App\Models\Category::VIDEO}}">{{\App\Models\Category::VIDEO}}</option>
                                        <option value="{{\App\Models\Category::IMAGE}}">{{\App\Models\Category::IMAGE}}</option>
                                        <option value="{{\App\Models\Category::DOCUMENT}}">{{\App\Models\Category::DOCUMENT}}</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3 status_option">
                                    <label for="validationCustom02">status</label>
                                    <select class="form-control mb-2" name="status">
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">InActive</option>
                                    </select>
                                </div>

                                <!--Summernote start-->
                                    <div class="col-md-12 mb-3">
                                        <section class="card">
                                            <header class="card-header head-border editor-title">
                                                Description
                                            </header>
                                            <div class="card-body editor-desc">
                                                <textarea class="summernote" name="description" id="summernote_1"></textarea>
                                            </div>
                                        </section>
                                    </div>
                                <!--Summernote end-->

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Image</label>
                                    <input type="file" class="dropify"  name="image"/>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-success" type="submit">Create Category</button>
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
    </script>
@endsection


