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
                    <div class="card-header">Create Promo Code</div>

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

                        <form class="needs-validation" action="{{route('admin.promo.store')}}" method="POST" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="promo code name" value="{{old('name')}}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" id="code" name="code" placeholder="promo code" value="{{old('code')}}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Type</label>
                                    <select class="form-control mb-2" name="type">
                                        <option value="fixed" selected>Fixed</option>
                                        <option value="percentage">Percentage</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="amount">Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount" placeholder="amount" value="{{old('amount')}}" required step="any">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">status</label>
                                    <select class="form-control mb-2" name="status">
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">InActive</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Image</label>
                                    <input type="file" name="image" class="dropify" data-max-file-size="3M"
                                           data-allowed-file-extensions="jpg jpeg png">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Create Promo</button>
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

