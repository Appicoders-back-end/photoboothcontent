@extends('admin.layouts.app')
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Users
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
                    </header>
                    <div class="card-body">
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr class="text-center">
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Subscription</th>
                                    <th>Coupon</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="text-center">
                                        <td>{{$user->first_name??'-'}}</td>
                                        <td>{{$user->last_name??'-'}}</td>
                                        <td>{{$user->email??'-'}}</td>
                                        <td>{{$user->phone??'-'}}</td>
                                        <td>
                                            @forelse($user->userSubcription as $sub)
                                                <span>{{ $sub->subcription->name??'-' }}</span>
                                            @empty
                                                -
                                            @endforelse
                                        </td>
                                        <td>
                                            @forelse($user->userCoupon as $coupons)
                                                <span style="color: #ffffff;font-weight: bold; background-color: #0e2e42; padding:2px 8px;">{{ $coupons->coupon->name??'' }}</span>
                                                <span >,</span>
                                            @empty
                                                -
                                            @endforelse
                                        </td>
                                        <td>

                                            <div class="col-md-3 mb-3">
                                                <form action="{{ route('admin.users.changeStatus',$user->id) }}" method="GET">
                                                    <select class="form-control mb-2" id="status" name="status">
                                                        <option value="" disabled selected>Select Status</option>
                                                        <option value="inactive" @if($user->status == "inactive") selected @endif>InActive</option>
                                                        <option value="active" @if($user->status == "active") selected @endif>Active</option>
                                                    </select>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('change','#status',function() {
                this.form.submit();
            });
        });
    </script>
@endsection
