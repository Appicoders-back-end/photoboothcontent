@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <div class="card-header">Create Subscription</div>
                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <form class="needs-validation" action="{{route('admin.subscriptions.store')}}" method="POST" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter Name" value="{{old('name')}}" required>
                                    @if (isset($errors) && $errors->has('name'))
                                        <div class="valid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="interval_time">Select Duration</label>
                                    <select name="interval_time" class="form-control" id="interval_time">
                                        <option value="">{{__("Select Duration")}}</option>
                                        <option value="{{\App\Models\Subscription::DURATION_WEEK}}">{{__("Weekly")}}</option>
                                        <option value="{{\App\Models\Subscription::DURATION_MONTH}}">{{__("Monthly")}}</option>
                                        <option value="{{\App\Models\Subscription::DURATION_YEAR}}">{{__("Yearly")}}</option>
                                    </select>
                                    @if (isset($errors) && $errors->has('interval_time'))
                                        <div class="valid-feedback">
                                            {{ $errors->first('interval_time') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="amount"
                                           placeholder="Price" value="{{old('price')}}" required>
                                    @if (isset($errors) && $errors->has('price'))
                                        <div class="valid-feedback">
                                            {{ $errors->first('price') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="price">No of Coupons</label>
                                    <input type="number" class="form-control" id="coupons" name="coupons"
                                           placeholder="Enter no of coupons" value="{{old('coupons')}}" required>
                                    @if (isset($errors) && $errors->has('coupons'))
                                        <div class="valid-feedback">
                                            {{ $errors->first('coupons') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Description</label>
                                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Status</label>
                                    <select class="form-control mb-2" name="status">
                                        <option value="{{\App\Models\Subscription::Active}}" selected>Active</option>
                                        <option value="{{\App\Models\Subscription::InActive}}">InActive</option>
                                    </select>
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

@endsection

