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
                        @include('admin.layouts.messages')
                        <form class="needs-validation" action="{{route('admin.promo.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="promo code name" value="{{old('name')}}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                           placeholder="promo code" value="{{old('code')}}" required>
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
                                    <input type="number" class="form-control" id="amount" name="amount"
                                           placeholder="amount" value="{{old('amount')}}" required step="any">
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
                                    <label for="validationCustom02">Image (Should be 1200px x 700px)</label>
                                    <input type="file" name="image" class="dropify" data-max-file-size="3M"
                                           data-allowed-file-extensions="jpg jpeg png" data-show-remove="false">
                                </div>
                            </div>
                            <button class="btn btn-sm btn-success" type="submit">Create Promo</button>
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

