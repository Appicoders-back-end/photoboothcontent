@extends('admin.layouts.app')
@section('style')
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
                    <div class="card-header">Update Subscription</div>
                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <form class="needs-validation" action="{{route('admin.subscriptions.update', $subscription->id)}}" method="POST" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter Name" value="{{old('name', $subscription->name)}}" required>
                                    @if (isset($errors) && $errors->has('name'))
                                        <p class="help-block m-1">
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        </p>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="interval_time">Select Duration</label>
                                    <select name="interval_time" class="form-control" id="interval_time">
                                        <option value="">{{__("Select Duration")}}</option>
                                        <option value="{{\App\Models\Subscription::DURATION_MONTH}}" {{$subscription->interval_time == \App\Models\Subscription::DURATION_MONTH ? 'selected' : null}}>{{__("Monthly")}}</option>
                                        <option value="{{\App\Models\Subscription::DURATION_YEAR}}" {{$subscription->interval_time == \App\Models\Subscription::DURATION_YEAR ? 'selected' : null}}>{{__("Yearly")}}</option>
                                    </select>
                                    @if (isset($errors) && $errors->has('interval_time'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('interval_time') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Description</label>
                                    <textarea class="summernote" name="description">{!! $subscription->description !!}</textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Status</label>
                                    <select class="form-control mb-2" name="status">
                                        <option value="{{\App\Models\Subscription::Active}}" {{$subscription->status == \App\Models\Subscription::Active ? 'selected' : null}}>Active</option>
                                        <option value="{{\App\Models\Subscription::InActive}}" {{$subscription->status == \App\Models\Subscription::InActive ? 'selected' : null}}>InActive</option>
                                    </select>
                                </div>

                            </div>
                            <button class="btn btn-sm btn-success" type="submit">Update Subscription</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
@section('script')
    <!--summernote-->
    <script src="{{asset('admin_assets')}}/assets/summernote/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 200,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                 // set focus to editable area after initializing summernote
            });
        });
    </script>
@endsection

