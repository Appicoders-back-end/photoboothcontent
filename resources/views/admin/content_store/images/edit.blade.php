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
                        @include('admin.layouts.messages')
                        <form class="needs-validation" action="{{route('admin.promo.update',$promo_code->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="promo code name" value="{{ old('name', $promo_code->name) }}"
                                           required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                           placeholder="promo code" value="{{ old('code', $promo_code->code) }}"
                                           required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Type</label>
                                    <select class="form-control mb-2" name="type">
                                        <option value="fixed" @if($promo_code->type == "fixed") selected @endif>Fixed
                                        </option>
                                        <option value="percentage"
                                                @if($promo_code->type == "percentage") selected @endif>Percentage
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="amount">Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount"
                                           placeholder="amount" value="{{ old('amount', $promo_code->amount) }}" step="any"
                                           required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">status</label>
                                    <select class="form-control mb-2" name="status">
                                        <option value="active" @if($promo_code->status == "active") selected @endif>
                                            Active
                                        </option>
                                        <option value="inactive" @if($promo_code->status == "inactive") selected @endif>
                                            InActive
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Image</label>
                                    @if($promo_code->image)
                                        <input type="file" class="dropify" name="image"
                                               data-default-file="{{ $promo_code->getImage() }}"/>
                                    @else
                                        <input type="file" class="dropify" name="image"/>
                                    @endif
                                </div>
                            </div>
                            <button class="btn btn-sm btn-success" type="submit">Update Promo</button>
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

