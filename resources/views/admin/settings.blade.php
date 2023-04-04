@extends('admin.layouts.app')
@section('style')
    <link href="{{asset('admin_assets')}}/css/dropify.css" rel="stylesheet">
@endsection
@section('content')
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <div class="card-header">General Settings</div>
                    <br>
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
                    <br>
                    <div class="card-body">
                        <form class="needs-validation" action="{{route('admin.storeSettings')}}" method="POST" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="logo">Logo</label>
                                    <input id="logo" type="file" class="dropify" name="logo"/>
                                </div>
                                {{--<div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Last name</label>
                                    <input type="text" class="form-control" name="last_name" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                </div>--}}
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
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
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });
    </script>
@endsection
