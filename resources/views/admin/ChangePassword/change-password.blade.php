@extends('admin.layouts.app')
@section('style')
    <style>
        .form-control {
            width: 92%;
        }

        .field_icon {
            position: relative;
            left: 93%;
            top: -29px;
        }

    </style>
@endsection

@section('content')

    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <div class="card-header">Change Password</div>

                    <div class="card-body">
                        @include('admin.layouts.messages')
                        <form method="POST" action="{{route('admin.update_password')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="old_password" class="form-label">Old Password</label>
                                <input type="password" class="form-control" name="old_password" id="old_password"
                                       autocomplete="off" placeholder="Old Password" value="{{ old('old_password') }}">
                                <span toggle="#password-field"
                                      class="fa fa-fw fa-eye-slash field_icon toggle-o-password"></span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                       autocomplete="off" placeholder="New Password" value="{{ old('password') }}">
                                <span toggle="#password-field"
                                      class="fa fa-fw fa-eye-slash field_icon toggle-password"></span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Change Password</label>
                                <input type="password" class="form-control" name="confirm_password"
                                       id="confirm_password" autocomplete="off" placeholder="Confirm Password">
                                <span toggle="#password-field"
                                      class="fa fa-fw fa-eye-slash field_icon toggle-c-password"></span>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
@section('script')
    <script>

        $(document).on('click', '.toggle-password', function () {
            $(this).toggleClass("fa-eye-slash fa-eye");
            var input = $("#password");
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
        });

        $(document).on('click', '.toggle-c-password', function () {
            $(this).toggleClass("fa-eye-slash fa-eye");
            var input = $("#confirm_password");
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
        });

        $(document).on('click', '.toggle-o-password', function () {
            $(this).toggleClass("fa-eye-slash fa-eye");
            var input = $("#old_password");
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
        });

    </script>

@endsection
