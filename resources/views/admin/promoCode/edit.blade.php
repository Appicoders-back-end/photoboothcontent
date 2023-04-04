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
                    <div class="card-header">Edit Promo Code</div>

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

                        <form class="needs-validation" action="{{route('admin.promo.update',['id'=>$promo_code->id])}}" method="POST" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Name</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="promo code name" value="{{ $promo_code->name }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Code</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="code" placeholder="promo code" value="{{ $promo_code->code }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Type</label>
                                    <select class="form-control mb-2" name="type">
                                        <option value="fixed" @if($promo_code->type == "fixed") selected @endif>Fixed</option>
                                        <option value="percentage" @if($promo_code->type == "percentage") selected @endif>Percentage</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">status</label>
                                    <select class="form-control mb-2" name="status">
                                        <option value="active" @if($promo_code->status == "active") selected @endif>Active</option>
                                        <option value="inactive" @if($promo_code->status == "inactive") selected @endif>InActive</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Amount</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="amount" placeholder="amount" value="{{ $promo_code->amount }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Image</label>
                                    <input type="file" class="dropify"  name="image" data-default-file="{{ asset('admin_assets/img/promo-codes/'.$promo_code->image) }}"/>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update Promo</button>
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

