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
                        @include('layouts.messages')
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
                                    {{--                                    <th>Action</th>--}}
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
                                                <span>{{ $sub->subscription->name." "??'-' }}</span>
                                            @empty
                                                -
                                            @endforelse
                                        </td>
                                        {{--                                        <td>{{$user->coupon??'-'}}</td>--}}
                                        <td>
                                            @forelse($user->userCoupon as $coupons)
                                                <span
                                                    style="color: #ffffff;font-weight: bold; background-color: #0e2e42; padding:2px 8px;">{{ $coupons->coupon->name??'' }}</span>
                                                <span>,</span>
                                            @empty
                                                -
                                            @endforelse
                                            {{--                                            {{ $user->userCoupon->count() > 0 ? implode(', ', $user->userCoupon->coupon->pluck('name')->toArray()) : '-' }}--}}
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('admin.users.changeStatus',$user->id) }}">
                                                 <span
                                                     class="text-{{ ($user->status == 'active' ?'success':'danger') }}">{{ucwords($user->status)??'-'}}
                                                 </span>
                                             </a>--}}
                                            <div class="col-md-3 mb-3">
                                                {{--                                                <label for="validationCustom02">status</label>--}}
                                                <form action="{{ route('admin.users.changeStatus',$user->id) }}"
                                                      method="GET">
                                                    <select class="form-control mb-2" id="status" name="status">
                                                        <option value="" disabled selected>Select Status</option>
                                                        <option value="inactive"
                                                                @if($user->status == "inactive") selected @endif>
                                                            InActive
                                                        </option>
                                                        <option value="active"
                                                                @if($user->status == "active") selected @endif>Active
                                                        </option>
                                                    </select>
                                                </form>
                                            </div>
                                        </td>
                                        {{-- <td>
                                             <div class="btn-group" role="group" aria-label="Basic example">
                                                 <a class="btn btn-primary mr-2"
                                                    href="#"><i
                                                         class="fa fa-eye"></i></a>
                                                 <a class="btn btn-success mr-2"
                                                    href="#"><i
                                                         class="fa fa-pencil-square-o"></i></a>
                                             </div>
                                         </td>--}}
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
        $(document).ready(function () {
            $(document).on('change', '#status', function () {
                this.form.submit();
            });
        });
    </script>
@endsection
